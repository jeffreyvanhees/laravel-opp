<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum MerchantType: string
{
    case CONSUMER = 'consumer';
    case BUSINESS = 'business';
}
