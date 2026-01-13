<?php


namespace EasyDoklad\SDK\Requests;


use EasyDoklad\SDK\Contracts\CollectModels;
use EasyDoklad\SDK\Models\Invoice;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListInvoices extends Request implements Paginatable, CollectModels
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/invoices';
    }

    public function createItemDtoFromResponse(Response $response, array $item): mixed
    {
        return Invoice::fromArray($item);
    }
}
