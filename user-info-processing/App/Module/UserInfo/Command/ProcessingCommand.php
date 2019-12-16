<?php

/*
 * This is a test application.
 *
 * It shows an example of working with an external API
 *   and processing request-response in various formats.
 *
 * Should be ran from the PHP Command Line Interface.
 *
 * (c) Eugene Tolubaria <m203a4@gmail.com>
 */

namespace App\Module\UserInfo\Command;

use App\Module\UserInfo\Enum\FormatType;
use App\Module\UserInfo\Processor\ProcessorFactory;
use Contract\Console\CommandInterface;

/**
 * Assumes console execution
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ProcessingCommand implements CommandInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        // input data
        $format = FormatType::JSON;
        $request = [
            'firstName'     => 'Vasya',
            'lastName'      => 'Pupkin',
            'dateOfBirth'   => '1984-07-31',
            'Salary'        => '1000',
            'creditScore'   => 'good',
        ];

        // processing
        try {
            $processorFactory = new ProcessorFactory();
            $processor = $processorFactory->createFromFormat($format);

            $status = $processor->process($userInfo);

            echo $status;
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}
