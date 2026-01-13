<?php


namespace EasyDoklad\SDK\Responses\DTO;


class BankTransferInfo
{
    public function __construct(
        public readonly ?string $bankName,
        public readonly ?string $bankAddress,
        public readonly ?string $bankBic,
        public readonly ?string $bankAccountIban,
        public readonly ?string $bankAccountNumber,
    ) { }

    public static function fromArray(array $info): static
    {
        return new static(
            bankName: $info['bank_name'],
            bankAddress: $info['bank_address'],
            bankBic: $info['bank_bic'],
            bankAccountIban: $info['bank_account_iban'],
            bankAccountNumber: $info['bank_account_number'],
        );
    }
}
