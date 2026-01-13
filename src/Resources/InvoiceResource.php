<?php


namespace EasyDoklad\SDK\Resources;


use EasyDoklad\SDK\Requests\CreateInvoice;
use EasyDoklad\SDK\Requests\DTO\PendingInvoice;
use EasyDoklad\SDK\Requests\GetInvoice;
use EasyDoklad\SDK\Requests\ListInvoices;
use EasyDoklad\SDK\Requests\UpdateInvoice;
use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Http\BaseResource;
use Saloon\PaginationPlugin\Paginator;

class InvoiceResource extends BaseResource
{
    /**
     * @return \Saloon\PaginationPlugin\Paginator
     */
    public function all(): Paginator
    {
        return $this->connector->paginate(new ListInvoices);
    }

    public function get(string $id): Invoice
    {
        return $this->connector->send(new GetInvoice($id))->dto();
    }

    public function create(array|PendingInvoice $invoice): Invoice
    {
        return $this->connector->send(new CreateInvoice($invoice))->dto();
    }

    public function update(string $id, array|PendingInvoice $invoice): Invoice
    {
        return $this->connector->send(new UpdateInvoice($id, $invoice))->dto();
    }
}
