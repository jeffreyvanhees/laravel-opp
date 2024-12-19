<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Requests;

use JeffreyVanHees\LaravelOpp\Concerns\Expandable;
use JeffreyVanHees\LaravelOpp\Concerns\Filterable;
use JeffreyVanHees\LaravelOpp\Concerns\Orderable;
use JeffreyVanHees\LaravelOpp\Data\Responses\MerchantProfileResponseData;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Saloon\Traits\Body\HasJsonBody;
use Spatie\LaravelData\DataCollection;

final class ListMerchantProfilesRequest extends Request implements HasBody, Paginatable
{
    use Expandable, Filterable, Orderable;
    use HasJsonBody;

    protected Method $method = Method::GET;

    /**
     * Create a new request
     */
    public function __construct(
        protected string $merchantUid
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/merchants/%s/profiles', $this->merchantUid);
    }

    /**
     * Create a DTO from response
     *
     * @return DataCollection<MerchantProfileResponseData>
     *
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        return MerchantProfileResponseData::collect(
            $response->json('data')
        );
    }
}
