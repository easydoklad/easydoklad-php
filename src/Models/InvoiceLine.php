<?php


namespace EasyDoklad\SDK\Models;


class InvoiceLine
{
    public function __construct(
        public readonly string         $id,
        public readonly int            $position,
        public readonly ?string        $title,
        public readonly ?string        $description,
        public readonly ?string        $unitOfMeasure,
        public readonly int|float|null $quantity,
        public readonly int|float|null $vatRate,
        public readonly string         $currency,
        public readonly ?int           $unitPriceVatExclusive,
        public readonly ?int           $totalPriceVatExclusive,
        public readonly ?int           $totalPriceVatInclusive,
        public readonly ?int           $vatAmount,
        public readonly string         $createdAt,
        public readonly string         $updatedAt,
    ) {}

    public static function fromArray(array $line): static
    {
        return new static(
            id: $line['id'],
            position: $line['position'],
            title: $line['title'],
            description: $line['description'],
            unitOfMeasure: $line['unit_of_measure'],
            quantity: $line['quantity'],
            vatRate: $line['vat_rate'],
            currency: $line['currency'],
            unitPriceVatExclusive: $line['unit_price_vat_exclusive'],
            totalPriceVatExclusive: $line['total_price_vat_exclusive'],
            totalPriceVatInclusive: $line['total_price_vat_inclusive'],
            vatAmount: $line['vat_amount'],
            createdAt: $line['created_at'],
            updatedAt: $line['updated_at'],
        );
    }
}
