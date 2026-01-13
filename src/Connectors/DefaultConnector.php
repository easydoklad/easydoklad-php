<?php


namespace EasyDoklad\SDK\Connectors;


use EasyDoklad\SDK\Contracts\CollectPaginatedDTOs;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\CursorPaginator;
use Saloon\PaginationPlugin\Paginator;

class DefaultConnector extends Connector implements HasPagination
{
    public function __construct(
        protected readonly string $apiKey,
        protected readonly string $host = 'https://faktury.stacktrace.sk/api/v1',
        protected readonly bool   $verifySSLCertificate = true,
    ) { }

    public function resolveBaseUrl(): string
    {
        return $this->host;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'X-Pagination' => 'cursor',
        ];
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator(token: $this->apiKey);
    }

    protected function defaultConfig(): array
    {
        return [
            'verify' => $this->verifySSLCertificate,
        ];
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends CursorPaginator
        {
            protected function getNextCursor(Response $response): int|string
            {
                return $response->json('meta.next_cursor');
            }

            protected function isLastPage(Response $response): bool
            {
                return is_null($response->json('meta.next_cursor'));
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                if ($request instanceof CollectPaginatedDTOs) {
                    return array_map(
                        fn (array $item) => $request->createItemDtoFromResponse($response, $item),
                        $response->json('data')
                    );
                }

                return $response->json('data');
            }

            protected function applyPagination(Request $request): Request
            {
                if ($this->currentResponse instanceof Response) {
                    $request->query()->add('cursor', $this->getNextCursor($this->currentResponse));
                }

                return $request;
            }
        };
    }
}
