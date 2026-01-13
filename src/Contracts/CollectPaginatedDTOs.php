<?php


namespace EasyDoklad\SDK\Contracts;


use Saloon\Http\Response;

interface CollectPaginatedDTOs
{
    public function createItemDtoFromResponse(Response $response, array $item): mixed;
}
