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

namespace App\Module\UserInfo\Processor;

use App\Module\UserInfo\Enum\FormatType;
use App\Module\UserInfo\HttpClient\FakeHttpClient;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ProcessorFactory
{
    /**
     * @param string $format
     *
     * @throws \RuntimeException
     *
     * @return ProcessorInterface
     */
    public function createFromFormat(string $format): ProcessorInterface
    {
        $httpClient = new FakeHttpClient();

        switch ($formatType) {
            case FormatType::XML:
                return new XmlProcessor($httpClient);
            case FormatType::JSON:
                return new JsonProcessor($httpClient);
            default:
                throw new \RuntimeException('Unexpected format');
        }
    }
}
