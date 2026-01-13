<?php


namespace EasyDoklad\SDK\Requests\DTO;


class PendingInvoice
{
    public function __construct(
        public readonly ?bool   $issue = null,
        public readonly ?string $number = null,
        public readonly ?string $issuedAt = null,
        public readonly ?string $suppliedAt = null,
        public readonly ?string $paymentDueTo = null,
        public readonly ?string $supplierBusinessName = null,
        public readonly ?string $supplierAddressLineOne = null,
        public readonly ?string $supplierAddressLineTwo = null,
        public readonly ?string $supplierAddressLineThree = null,
        public readonly ?string $supplierAddressCity = null,
        public readonly ?string $supplierAddressPostalCode = null,
        public readonly ?string $supplierAddressCountry = null,
        public readonly ?string $customerBusinessName = null,
        public readonly ?string $customerAddressLineOne = null,
        public readonly ?string $customerAddressLineTwo = null,
        public readonly ?string $customerAddressLineThree = null,
        public readonly ?string $customerAddressCity = null,
        public readonly ?string $customerAddressPostalCode = null,
        public readonly ?string $customerAddressCountry = null,
        public readonly ?bool   $vatEnabled = null,
        public readonly ?bool   $vatReverseCharge = null,
        public readonly ?string $footerNote = null,
        public readonly ?string $issuedBy = null,
        public readonly ?string $issuedByEmail = null,
        public readonly ?string $issuedByPhoneNumber = null,
        public readonly ?string $issuedByPhoneWebsite = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $bankName = null,
        public readonly ?string $bankAddress = null,
        public readonly ?string $bankBic = null,
        public readonly ?string $bankAccountNumber = null,
        public readonly ?string $bankAccountIban = null,
        public readonly ?string $variableSymbol = null,
        public readonly ?string $specificSymbol = null,
        public readonly ?string $constantSymbol = null,
        public readonly ?bool   $showPayBySquare = null,
        public readonly ?string $template = null,
        public readonly ?array  $lines = null,
    ) { }

    public function toArray(): array
    {
        return array_filter([
            'issue' => $this->issue,
            'invoice_number' => $this->number,
            'issued_at' => $this->issuedAt,
            'supplied_at' => $this->suppliedAt,
            'payment_due_to' => $this->paymentDueTo,
            'supplier_business_name' => $this->supplierBusinessName,
            'supplier_address_line_one' => $this->supplierAddressLineOne,
            'supplier_address_line_two' => $this->supplierAddressLineTwo,
            'supplier_address_line_three' => $this->supplierAddressLineThree,
            'supplier_address_city' => $this->supplierAddressCity,
            'supplier_address_postal_code' => $this->supplierAddressPostalCode,
            'supplier_address_country' => $this->supplierAddressCountry,
            'customer_business_name' => $this->customerBusinessName,
            'customer_address_line_one' => $this->customerAddressLineOne,
            'customer_address_line_two' => $this->customerAddressLineTwo,
            'customer_address_line_three' => $this->customerAddressLineThree,
            'customer_address_city' => $this->customerAddressCity,
            'customer_address_postal_code' => $this->customerAddressPostalCode,
            'customer_address_country' => $this->customerAddressCountry,
            'vat_enabled' => $this->vatEnabled,
            'vat_reverse_charge' => $this->vatReverseCharge,
            'footer_note' => $this->footerNote,
            'issued_by' => $this->issuedBy,
            'issued_by_email' => $this->issuedByEmail,
            'issued_by_phone_number' => $this->issuedByPhoneNumber,
            'issued_by_phone_website' => $this->issuedByPhoneWebsite,
            'payment_method' => $this->paymentMethod,
            'bank_name' => $this->bankName,
            'bank_address' => $this->bankAddress,
            'bank_bic' => $this->bankBic,
            'bank_account_number' => $this->bankAccountNumber,
            'bank_account_iban' => $this->bankAccountIban,
            'variable_symbol' => $this->variableSymbol,
            'specific_symbol' => $this->specificSymbol,
            'constant_symbol' => $this->constantSymbol,
            'show_pay_by_square' => $this->showPayBySquare,
            'template' => $this->template,
            'lines' => $this->lines ? array_map(fn (PendingInvoiceLine $line) => $line->toArray(), $this->lines) : null,
        ], fn (mixed $value) => $value !== null);

    }
}
