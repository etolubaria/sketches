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

use Contract\HttpClient\HttpClientInterface;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
abstract class AbstractProcessor implements ProcessorInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param array $userInfo
     * 
     * @return string Prepared HTTP request
     */
    abstract protected function prepareRequest(array $userInfo): string;

    /**
     * @param string $userInfo
     * 
     * @return string Response status
     */
    abstract protected function getStatusFromResponse(string $response): string;

    /**
     * @inheritDoc
     */
    public function process(array $userInfo): string
    {
        $request = $this->prepareRequest($userInfo);

        $response = $this->httpClient->send('GET', 'someWhere', $request);

        return $this->getStatusFromResponse($response);
    }
}
