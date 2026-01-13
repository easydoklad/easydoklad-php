<?php


namespace EasyDoklad\SDK\Requests;


use EasyDoklad\SDK\Requests\DTO\PendingInvoice;
use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected PendingInvoice|array $invoice
    ) { }

    public function resolveEndpoint(): string
    {
        return '/invoices';
    }

    protected function defaultBody(): array
    {
        if ($this->invoice instanceof PendingInvoice) {
            return $this->invoice->toArray();
        }

        return $this->invoice;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Invoice::fromArray($response->json('data'));
    }
}
