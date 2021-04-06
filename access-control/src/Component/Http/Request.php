<?php

declare(strict_types=1);

namespace AccessControlExample\Component\Http;

class Request implements RequestInterface
{
    public function getToken(): string
    {
        $availableTokens = ['valid token', 'invalid token'];
        $currentTokenKey = array_rand($availableTokens);

        return $availableTokens[$currentTokenKey];
    }
}
