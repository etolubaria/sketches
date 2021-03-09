<?php

class CyberSource implements PaymentProviderInterface
{
    public function getName(): string
    {
        return 'CyberSource';
    }

    public function charge(string $amount, string $currency): bool
    {
        // do something
        return true;
    }
}
