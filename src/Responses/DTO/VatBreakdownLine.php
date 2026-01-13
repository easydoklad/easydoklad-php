<?php


namespace EasyDoklad\SDK\Responses\DTO;


class VatBreakdownLine
{
    public function __construct(
        public readonly float|int $rate,
        public readonly int       $base,
        public readonly int       $total,
    ) {}

    public static function fromArray(array $line): static
    {
        return new static(
            rate: $line['rate'],
            base: $line['base'],
            total: $line['total'],
        );
    }
}
