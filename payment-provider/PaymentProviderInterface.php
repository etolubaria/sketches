<?php

interface PaymentProviderInterface
{
    public function getName(): string;
    public function charge(string $amount, string $currency): bool;
}
