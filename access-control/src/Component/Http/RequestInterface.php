<?php

declare(strict_types=1);

namespace AccessControlExample\Component\Http;

interface RequestInterface
{
    public function getToken(): string;
}
