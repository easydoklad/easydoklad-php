<?php


namespace EasyDoklad\SDK\Resources;


use EasyDoklad\SDK\Requests\CreateInvoice;
use EasyDoklad\SDK\Requests\DTO\PendingInvoice;
use EasyDoklad\SDK\Requests\GetInvoice;
use EasyDoklad\SDK\Requests\IssueInvoice;
use EasyDoklad\SDK\Requests\ListInvoices;
use EasyDoklad\SDK\Requests\SendInvoice;
use EasyDoklad\SDK\Requests\UpdateInvoice;
use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Http\BaseResource;
use Saloon\PaginationPlugin\Paginator;

class InvoiceResource extends BaseResource
{
    /**
     * List available invoices.
     *
     * @return \Saloon\PaginationPlugin\Paginator
     */
    public function all(): Paginator
    {
        return $this->connector->paginate(new ListInvoices);
    }

    /**
     * Get an invoice detail.
     */
    public function get(string $id): Invoice
    {
        return $this->connector->send(new GetInvoice($id))->dto();
    }

    /**
     * Create an invoice.
     */
    public function create(array|PendingInvoice $invoice): Invoice
    {
        return $this->connector->send(new CreateInvoice($invoice))->dto();
    }

    /**
     * Update an invoice.
     */
    public function update(string $id, array|PendingInvoice $invoice): Invoice
    {
        return $this->connector->send(new UpdateInvoice($id, $invoice))->dto();
    }

    /**
     * Send an invoice by mail.
     */
    public function send(string $id, string $email, ?string $message = null, ?string $locale = null): Invoice
    {
        return $this->connector->send(new SendInvoice($id, $email, $message, $locale))->dto();
    }

    /**
     * Issue an invoice.
     */
    public function issue(string $id): Invoice
    {
        return $this->connector->send(new IssueInvoice($id))->dto();
    }
}
