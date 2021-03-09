<?php

$amount = '199.99';
$currency = Currency::USD;
$paymentProviderId = PaymentProviderEnum::AUTHORIZE_NET;

$paymentProvider = PaymentProviderFactory::create($paymentProviderId);

echo 'Charge from ', $paymentProvider->getName(), ':', PHP_EOL;
if ($paymentProvider->charge($amount, $currency)) {
    echo 'Charged ', CurrencySign::get($currency), $amount, PHP_EOL;
} else {
    echo 'A payment error has occurred. Please contact support';
}