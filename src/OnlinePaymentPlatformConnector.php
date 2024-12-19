<?php

namespace JeffreyVanHees\LaravelOpp;

use Illuminate\Support\Facades\URL;
use JeffreyVanHees\LaravelOpp\Resources\MerchantsResource;
use Saloon\Contracts\Authenticator;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * Online Payment Platform Connector
 */
class OnlinePaymentPlatformConnector extends Connector implements HasBody, HasPagination
{
    use AlwaysThrowOnErrors;
    use HasJsonBody;

    protected array $filters = [];

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return config('services.opp.url');
    }

    /**
     * Merchants resource
     */
    public function merchants(): MerchantsResource
    {
        return new MerchantsResource($this);
    }

    /**
     * Partner resource
     *
     * @return void
     */
    public function partner() {}

    public function transactions() {}

    /**
     * Paginate the response
     */
    public function paginate(Request $request): PagedPaginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected function isLastPage(Response $response): bool
            {
                return ! $response->json('has_more');
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->dto();
            }

            protected function applyPagination(Request $request): Request
            {
                return tap($request, function (Request $request) {
                    $request->query()->add('page', $this->currentPage);
                    $request->query()->add('perpage', $this->perPageLimit);
                });
            }
        };
    }

    /**
     * Define default authenticator
     */
    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator(config('services.opp.api_key'));
    }

    /**
     * Define default authenticator
     */
    protected function defaultBody(): array
    {
        return [
            'notify_url' => config('services.opp.notify_url'),
        ];
    }
}
