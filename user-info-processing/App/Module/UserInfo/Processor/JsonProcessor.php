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

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class JsonProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    private $submitDataResultMap = [
        'success'   => 'Sold',
        'reject'    => 'Reject',
        'error'     => 'Error',
    ];

    /**
     * @inheritDoc
     */
    protected function prepareRequest(array $userInfo): string
    {
        return json_encode(['userInfo' => $userInfo], JSON_THROW_ON_ERROR);
    }

    /**
     * @inheritDoc
     */
    protected function getStatusFromResponse(string $response): string
    {
        $json = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('SubmitDataResult', $json)) {
            throw new RuntimeException('SubmitDataResult does not exist');
        }

        $submitDataResult = $json['SubmitDataResult'];

        if (!array_key_exists($submitDataResult, $this->submitDataResultMap)) {
            throw new RuntimeException('Recieved unexpected submitDataResult');
        }

        $status = $this->submitDataResultMap[$submitDataResult];

        return $status;
     }
}
