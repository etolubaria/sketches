<?php

class PaymentProviderFactory
{
    public static function create(int $paymentProviderId): PaymentProviderInterface
    {
        switch ($paymentProviderId) {
            case PaymentProviderEnum::AUTHORIZE_NET:
                return new AuthorizeNet();
            case PaymentProviderEnum::CYBER_SOURCE:
                return new CyberSource();
            case PaymentProviderEnum::HEARTLAND:
                return new Heartland();
            case PaymentProviderEnum::WIRE_TRANSFER:
                return new WireTransfer();
            default:
                throw new \RuntimeException('Payment provider does not exist');
        }
    }
}
