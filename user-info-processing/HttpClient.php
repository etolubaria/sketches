<?php

namespace HttpClient;

class HttpClient
{
    /**
     * @param string $method Http method
     * @param string $uri
     * @param string $request Http request body
     *
     * @return string Http response body
     */
    public function send(string $method, string $uri, string $request): string
    {
        // This is an immitation of sending
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
