<?php


namespace EasyDoklad\SDK\Models;


class NumberSequence
{
    public function __construct(
        public readonly string $format,
        public readonly int    $number,
    ) { }

    public static function fromArray(array $sequence): static
    {
        return new static(
            format: $sequence['format'],
            number: $sequence['number'],
        );
    }
}
