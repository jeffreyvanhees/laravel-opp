<?php

namespace JeffreyVanHees\LaravelOpp\Resources;

use JeffreyVanHees\LaravelOpp\Concerns\Expandable;
use JeffreyVanHees\LaravelOpp\Concerns\Filterable;
use JeffreyVanHees\LaravelOpp\Concerns\Orderable;
use JeffreyVanHees\LaravelOpp\Data\Requests\CreateMerchantRequestData;
use JeffreyVanHees\LaravelOpp\Data\Responses\MerchantResponseData;
use JeffreyVanHees\LaravelOpp\Requests\CreateMerchantRequest;
use JeffreyVanHees\LaravelOpp\Requests\ListMerchantsRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;

class MerchantsResource extends BaseResource
{
    use Expandable, Filterable, Orderable;

    /**
     * List all merchants as a paginated list
     *
     * @return PagedPaginator<MerchantResponseData>
     */
    public function paginate(): PagedPaginator
    {
        return $this->connector->paginate(
            new ListMerchantsRequest
        );
    }

    /**
     * Create new merchant
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(CreateMerchantRequestData|array $data): Response
    {
        return $this->connector->send(
            new CreateMerchantRequest($data)
        );
    }

    /**
     * Return profile resource
     */
    public function profiles(string $merchantUid): MerchantProfilesResource
    {
        return new MerchantProfilesResource($this->connector, $merchantUid);
    }
}
