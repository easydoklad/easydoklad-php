<?php


namespace EasyDoklad\SDK\Responses\DTO;


class Country
{
    public function __construct(
        public readonly string $name,
        public readonly string $code,
    ) { }

    public static function fromArray(array $country): static
    {
        return new static(
            name: $country['name'],
            code: $country['code'],
        );
    }
}
