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
use App\Module\UserInfo\Processor\JsonProcessor;
use App\Module\UserInfo\Processor\ProcessorInterface;
use App\Module\UserInfo\Processor\XmlProcessor;
use Contract\Command\CommandInterface;

/**
 * Assumes console execution
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ProcessingCommand implements CommandInterface
{
    /**
     * @param string $formatType
     * 
     * @return ProcessorInterface
     * 
     * @throws RuntimeException
     */
    private function getProcessor(string $formatType): ProcessorInterface
    {
        switch ($formatType) {
            case FormatType::XML:
                return new XmlProcessor();
            case FormatType::JSON:
                return new JsonProcessor();
            default:
                throw new \RuntimeException('Unexpected format');
        }
    }

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        // test data
        $formatType = FormatType::JSON;
        $request = [
            'firstName'     => 'Vasya',
            'lastName'      => 'Pupkin',
            'dateOfBirth'   => '1984-07-31',
            'Salary'        => '1000',
            'creditScore'   => 'good',
        ];

        try {
            $processor = $this->getProcessor($formatType);
            $status = $processor->process($userInfo);

            echo $status;
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
