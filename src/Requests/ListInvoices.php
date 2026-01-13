<?php


namespace EasyDoklad\SDK\Requests;


use EasyDoklad\SDK\Contracts\CollectPaginatedDTOs;
use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListInvoices extends Request implements Paginatable, CollectPaginatedDTOs
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
