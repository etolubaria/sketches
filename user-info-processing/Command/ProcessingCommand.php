<?php

namespace Command;

use Enum\FormatType;
use Processor\JsonProcessor;
use Processor\ProcessorInterface;
use Processor\XmlProcessor;

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
     * @param string $formatType
     * @param array $userInfo
     */
    public function execute(string $formatType, array $userInfo): void
    {
        try {
            $processor = $this->getProcessor($formatType);
            $status = $processor->process($userInfo);
            echo $status;
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
