<?php


namespace EasyDoklad\SDK\Requests;


use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class IssueInvoice extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $id,
    ) { }

    public function resolveEndpoint(): string
    {
        return "/invoices/{$this->id}/issue";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Invoice::fromArray($response->json('data'));
    }
}
