<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Requests;

use JeffreyVanHees\LaravelOpp\Concerns\Expandable;
use JeffreyVanHees\LaravelOpp\Concerns\Filterable;
use JeffreyVanHees\LaravelOpp\Concerns\Orderable;
use JeffreyVanHees\LaravelOpp\Data\Responses\MerchantResponseData;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Saloon\Traits\Body\HasJsonBody;
use Spatie\LaravelData\DataCollection;

final class ListMerchantsRequest extends Request implements HasBody, Paginatable
{
    use Expandable, Filterable, Orderable;
    use HasJsonBody;

    protected Method $method = Method::GET;

    /**
     * Create a new request
     */
    public function __construct()
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/merchants';
    }

    /**
     * Create a DTO from response
     *
     * @return DataCollection<MerchantResponseData>
     *
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        return MerchantResponseData::collect(
            $response->json('data')
        );
    }
}
