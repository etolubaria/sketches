<?php

class WireTransfer implements PaymentProviderInterface
{
    public function getName(): string
    {
        return 'Wire Transfer';
    }

    public function charge(string $amount, string $currency): bool
    {
        // do something
        return false;
    }
}
