<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class EmailQueueConsumer implements ConsoleCommandInterface
{
    /**
     * @var QueueInterface
     */
    private $emailQueue;

    /**
     * @var QueueInterface
     */
    private $failedQueue;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @param QueueInterface $emailQueue
     * @param QueueInterface $failedQueue
     * @param MailerInterface $mailer
     * @param LoggerInterface $logger
     * @param OutputInterface $output
     */
    public function __construct(
        QueueInterface $emailQueue,
        QueueInterface $failedQueue,
        MailerInterface $mailer,
        LoggerInterface $logger,
        OutputInterface $output
    ) {
        $this->emailQueue = $emailQueue;
        $this->failedQueue = $failedQueue;
        $this->mailer = $mailer;
        $this->logger = $logger;
        $this->output = $output;
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $notification = $this->emailQueue->pop();

        // Yii mailer is a piece of shit
        $this->mailer->layout = $notification->getLayout();
        $sendingResult = $this->mailer
            ->compose($notification->getTemplate(), $notification->getContext())
            ->setSubject($notification->getSubject())
            ->setFrom($notification->getSender())
            ->setTo($notification->getReceiver())
            ->send();

        if (!$sendingResult) {
            $this->failedQueue->push($notification);
            $this->logger->error('Unable to send message', $notification);
            $this->output->print('The message cannot be sent for unknown reason');

            return;
        }

        $this->output->print('One message sent successfully');
    }
}
