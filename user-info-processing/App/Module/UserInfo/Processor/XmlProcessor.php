<?php

namespace App\Module\UserInfo\Processor;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class XmlProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    private $creditScoreMap = [
        'good'  => 700,
        'bad'   => 300,
    ];

    /**
     * @var array
     */
    private $returnCodeDescriptionMap = [
        'SUCCESS'   => 'Sold',
        'REJECT'    => 'Reject',
        'ERROR'     => 'Error',
    ];

    /**
     * @param array $userInfo
     * 
     * @return array Normalized user information
     */
    private function normalizeUserInfo(array $userInfo): array
    {
        if (array_key_exists('creditScore', $userInfo)
            && array_key_exists($userInfo['creditScore'], $this->creditScoreMap)
        ) {
            $userInfo['creditScore']
                = $this->creditScoreMap[$userInfo['creditScore']];
        }

        return $userInfo;
    }

    /**
     * @inheritDoc
     */
    protected function prepareRequest(array $userInfo): string
    {
        $userInfo = $this->normalizeUserInfo($userInfo);
        $userInfo = array_flip($userInfo);

        $xml = new SimpleXMLElement('<userInfo version="1.6" />');
        array_walk_recursive($userInfo, array ($xml, 'addChild'));
        $request = $xml->asXML();

        return $request;
    }

    /**
     * @inheritDoc
     */
    protected function getStatusFromResponse(string $response): string
    {
        $xml = new SimpleXMLElement($response);

        if (!isset($xml->returnCodeDescription)) {
            throw new RuntimeException('returnCodeDescription does not exist');
        }

        $returnCodeDescription = (string) $xml->returnCodeDescription;

        if (!array_key_exists($returnCodeDescription, $this->returnCodeDescriptionMap)) {
            throw new RuntimeException('Recieved unexpected returnCodeDescription');
        }

        $status = $this->returnCodeDescriptionMap[$returnCodeDescription];

        return $status;
    }
}
