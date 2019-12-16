<?php

namespace App\Module\UserInfo\Command;

use App\Module\UserInfo\Enum\FormatType;
use App\Module\UserInfo\Processor\JsonProcessor;
use App\Module\UserInfo\Processor\ProcessorInterface;
use App\Module\UserInfo\Processor\XmlProcessor;

/**
 * Assumes console execution
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ProcessingCommand
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
     * Entry point of the current command.
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
