<?php

declare(strict_types=1);

namespace EmailQueueConsumerExample\Worker;

use EmailQueueConsumerExample\Component\Console\ConsoleCommand;
use EmailQueueConsumerExample\Component\Console\OutputInterface;
use EmailQueueConsumerExample\Component\Logger\LoggerInterface;
use EmailQueueConsumerExample\Component\Mailer\Mailer;
use EmailQueueConsumerExample\Component\MessageQueue\QueueInterface;

/**
 * Class EmailQueueConsumer
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class EmailQueueConsumer extends ConsoleCommand
{
    private QueueInterface $emailQueue;
    private QueueInterface $failedEmailQueue;
    private Mailer $mailer;

    public function __construct(
        LoggerInterface $logger,
        OutputInterface $output,
        QueueInterface $emailQueue,
        QueueInterface $failedEmailQueue,
        Mailer $mailer
    ) {
        parent::__construct($logger, $output);

        $this->emailQueue = $emailQueue;
        $this->failedEmailQueue = $failedEmailQueue;
        $this->mailer = $mailer;
    }

    public function run(): void
    {
        $notification = $this->emailQueue->pop();

        $this->mailer->layout = $notification->getLayout();
        $sendingResult = $this->mailer
            ->compose($notification->getTemplate(), $notification->getContext())
            ->setSubject($notification->getSubject())
            ->setFrom($notification->getSender())
            ->setTo($notification->getReceiver())
            ->send();

        if (!$sendingResult) {
            $this->failedEmailQueue->push($notification);
            $this->logger->error('Unable to send message', $notification);
            $this->output->print('The message cannot be sent for unknown reason');

            return;
        }

        $this->output->print('One message sent successfully');
    }
}
