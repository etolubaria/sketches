<?php

namespace App\Module\UserInfo\HttpClient;

use Contract\HttpClient\HttpClientInterface;

/**
 * Provides an immitation of sending HTTP requests
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class FakeHttpClient implements HttpClientInterface
{
    /**
     * @inheritDoc
     */
    public function send(string $method, string $uri, string $request): string
    {
         $response =<<<XML_RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
            <userInfo version="1.6">
                <returnCode>1</returnCode>
                <returnCodeDescription>SUCCESS</returnCodeDescription>
                <transactionId>AC158457A86E711D0000016AB036886A03E7</transactionId>
            </userInfo>
XML_RESPONSE;

        $response =<<<JSON_RESPONSE
{"SubmitDataResult":"success"}
JSON_RESPONSE;

        return $response;
    }
}
