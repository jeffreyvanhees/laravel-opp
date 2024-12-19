<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Responses;

use Saloon\Http\Response;
use Spatie\LaravelData\Data;

final class MerchantProfileResponseData extends Data
{
    public function __construct(
        public string $uid,
        public string $status,
        public ?string $name,
        public ?string $sector,
        public ?string $url,
    ) {
        // ...
    }

    public static function fromResponse(Response $response): MerchantProfileResponseData
    {
        return self::from($response->json());
    }
}
