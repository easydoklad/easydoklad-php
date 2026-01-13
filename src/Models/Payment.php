<?php


namespace EasyDoklad\SDK\Models;


class Payment
{
    public function __construct(
        public readonly string $id,
        public readonly int    $amount,
        public readonly string $currency,
        public readonly string $paymentMethod,
        public readonly string $receivedAt,
        public readonly string $createdAt,
    ) {}

    public static function fromArray(array $payment): static
    {
        return new static(
            id: $payment['id'],
            amount: $payment['amount'],
            currency: $payment['currency'],
            paymentMethod: $payment['payment_method'],
            receivedAt: $payment['received_at'],
            createdAt: $payment['created_at'],
        );
    }
}
