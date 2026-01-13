<?php


namespace EasyDoklad\SDK\Responses\DTO;


class Address
{
    public function __construct(
        public readonly ?string $lineOne,
        public readonly ?string $lineTwo,
        public readonly ?string $lineThree,
        public readonly ?string $city,
        public readonly ?string $postalCode,
        public readonly ?Country $country,
    ) { }

    public static function fromArray(array $address): static
    {
        return new static(
            lineOne: $address['line_one'],
            lineTwo: $address['line_two'],
            lineThree: $address['line_three'],
            city: $address['city'],
            postalCode: $address['postal_code'],
            country: $address['country'] ? Country::fromArray($address['country']) : null,
        );
    }
}
