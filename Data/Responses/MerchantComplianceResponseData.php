<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Responses;

use Spatie\LaravelData\Data;

final class MerchantComplianceResponseData extends Data
{
    public function __construct(
        public string $level,
        public string $status,
        public string $overview_url,
        public array $requirements = [],
    ) {
        // ...
    }
}
