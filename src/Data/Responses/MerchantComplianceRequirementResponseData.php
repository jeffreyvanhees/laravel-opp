<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Responses;

use JsonException;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Http\Response;
use Saloon\Traits\Responses\HasResponse;
use Spatie\LaravelData\Data;

final class MerchantComplianceRequirementResponseData extends Data implements WithResponse
{
    use HasResponse;

    public function __construct(
        public string $uid,
        public string $status,
    ) {
        // ...
    }

    /**
     * @throws JsonException
     */
    public static function fromResponse(Response $response): MerchantComplianceRequirementResponseData
    {
        return self::from($response->json());
    }
}
