<?php


namespace EasyDoklad\SDK\Requests\DTO;


class PendingInvoiceLine
{
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?string $quantity = null,
        public readonly ?string $unitOfMeasure = null,
        public readonly ?int    $unitPrice = null,
        public readonly ?int    $vat = null,
        public readonly ?int    $totalVatExclusive = null,
        public readonly ?int    $totalVatInclusive = null,
    ) { }

    public function toArray(): array
    {
        return array_filter([
            'title' => $this->title,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'unit_of_measure' => $this->unitOfMeasure,
            'unit_price' => $this->unitPrice,
            'vat' => $this->vat,
            'total_vat_exclusive' => $this->totalVatExclusive,
            'total_vat_inclusive' => $this->totalVatInclusive,
        ], fn (mixed $value) => $value !== null);
    }
}
