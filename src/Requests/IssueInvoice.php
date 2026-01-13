<?php


namespace EasyDoklad\SDK\Requests;


use Saloon\Enums\Method;
use Saloon\Http\Request;

class IssueInvoice extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/invoices/{$this->id}/issue";
    }
}
