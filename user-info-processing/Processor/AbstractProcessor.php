<?php

namespace Processor;

abstract class AbstractProcessor implements ProcessorInterface
{
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

        $httpClient = new HttpClient();
        $response = $httpClient->send('GET', 'someWhere', $request);

        return $this->getStatusFromResponse($response);
    }
}
