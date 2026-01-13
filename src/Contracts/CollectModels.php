<?php


namespace EasyDoklad\SDK\Contracts;


use Saloon\Http\Response;

interface CollectModels
{
    public function createItemDtoFromResponse(Response $response, array $item): mixed;
}
