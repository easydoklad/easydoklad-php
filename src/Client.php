<?php


namespace EasyDoklad\SDK;


use EasyDoklad\SDK\Resources\InvoiceResource;
use Saloon\Http\Connector;

class Client
{
    public function __construct(
        protected Connector $connector
    ) { }

    public function invoices(): InvoiceResource
    {
        return new InvoiceResource($this->connector);
    }
}
