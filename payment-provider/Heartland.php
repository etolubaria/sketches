<?php

class Heartland implements PaymentProviderInterface
{
    public function getName(): string
    {
        return 'Heartland';
    }

    public function charge(string $amount, string $currency): bool
    {
        // do something
        return false;
    }
}
