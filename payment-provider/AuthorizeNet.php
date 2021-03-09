<?php

class AuthorizeNet implements PaymentProviderInterface
{
    public function getName(): string
    {
        return 'Authorize.Net';
    }

    public function charge(string $amount, string $currency): bool
    {
        // do something
        return true;
    }
}
