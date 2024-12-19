<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Requests;

use JeffreyVanHees\LaravelOpp\Data\Requests\CreateMerchantRequestData;
use JeffreyVanHees\LaravelOpp\Data\Responses\MerchantResponseData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

final class CreateMerchantRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * Create a new request
     */
    public function __construct(
        public CreateMerchantRequestData|array $data,
    ) {
        if (! $data instanceof CreateMerchantRequestData) {
            $this->data = CreateMerchantRequestData::from($data);
        }
    }

    public function resolveEndpoint(): string
    {
        return '/merchants';
    }

    /**
     * Create a DTO from response
     */
    public function createDtoFromResponse(Response $response): MerchantResponseData
    {
        return MerchantResponseData::from($response);
    }

    /**
     * Convert data to array
     */
    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
