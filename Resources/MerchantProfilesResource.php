<?php

namespace JeffreyVanHees\LaravelOpp\Resources;

use JeffreyVanHees\LaravelOpp\Data\Responses\MerchantResponseData;
use JeffreyVanHees\LaravelOpp\OnlinePaymentPlatformConnector;
use JeffreyVanHees\LaravelOpp\Requests\ListMerchantProfilesRequest;
use Saloon\PaginationPlugin\PagedPaginator;

class MerchantProfilesResource extends BaseResource
{
    public function __construct(
        protected OnlinePaymentPlatformConnector $connector,
        protected string $merchantUid
    ) {
        parent::__construct($connector);
    }

    /**
     * List all profiles of a merchant as a paginated list
     *
     * @return PagedPaginator<MerchantResponseData>
     */
    public function paginate(): PagedPaginator
    {
        return $this->connector->paginate(
            new ListMerchantProfilesRequest($this->merchantUid)
        );
    }

    public function create() {}
}
