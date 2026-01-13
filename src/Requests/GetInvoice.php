<?php


namespace EasyDoklad\SDK\Requests;


use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoice extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $id,
    ) { }

    public function resolveEndpoint(): string
    {
        return "/invoices/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Invoice::fromArray($response->json('data'));
    }
}
