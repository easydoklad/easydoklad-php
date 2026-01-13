<?php


namespace EasyDoklad\SDK\Models;


class Company
{
    public function __construct(
        public readonly ?string  $businessName,
        public readonly ?string  $businessId,
        public readonly ?string  $vatId,
        public readonly ?string  $euVatId,
        public readonly ?string  $email,
        public readonly ?string  $phoneNumber,
        public readonly ?string  $website,
        public readonly ?string  $additionalInfo,
        public readonly ?Address $address,
    ) { }

    public static function fromArray(array $company): static
    {
        return new static(
            businessName: $company['business_name'],
            businessId: $company['business_id'],
            vatId: $company['vat_id'],
            euVatId: $company['eu_vat_id'],
            email: $company['email'],
            phoneNumber: $company['phone_number'],
            website: $company['website'],
            additionalInfo: $company['additional_info'],
            address: $company['address'] ? Address::fromArray($company['address']) : null,
        );
    }
}
