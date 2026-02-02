<?php


namespace EasyDoklad\SDK\Requests;


use EasyDoklad\SDK\Responses\DTO\Invoice;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SendInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $id,
        protected readonly string $email,
        protected readonly ?string $message = null,
        protected readonly ?string $locale = null,
    ) { }

    public function resolveEndpoint(): string
    {
        return "/invoices/{$this->id}/send";
    }

    protected function defaultBody(): array
    {
        $body = [
            'email' => $this->email,
        ];

        if ($this->message) {
            $body['message'] = $this->message;
        }

        if ($this->locale) {
            $body['locale'] = $this->locale;
        }

        return $body;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Invoice::fromArray($response->json('data'));
    }
}
