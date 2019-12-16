<?php

namespace Processor;

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
