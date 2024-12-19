<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Responses;

use App\Integrations\OnlinePaymentPlatform\Enums\Country;
use App\Integrations\OnlinePaymentPlatform\Enums\MerchantAddressType;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;
use Spatie\LaravelData\Data;

final class MerchantAddressResponseData extends Data implements WithResponse
{
    use HasResponse;

    public function __construct(
        public string $uid,
        public string $status,
        public string $created,
        public string $updated,
        public string $verified,
        public MerchantAddressType $type,
        public string $address_line_1,
        public ?string $address_line_2,
        public string $zipcode,
        public string $city,
        public Country $country,
    ) {
        // ...
    }
}
