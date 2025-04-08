<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Responses;

use JeffreyVanHees\LaravelOpp\Enums\MerchantType;
use JsonException;
use Saloon\Http\Response;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class MerchantResponseData extends Data
{
    public function __construct(
        public string $uid,
        public string $status,
        public MerchantType $type,
        public MerchantComplianceResponseData $compliance,
        #[DataCollectionOf(MerchantProfileResponseData::class)] public DataCollection $profiles,
    ) {
        // ...
    }

    /**
     * Return a DTO from response
     *
     * @throws JsonException
     */
    public static function fromResponse(Response $response): self
    {
        return self::from($response->json());
    }
}
