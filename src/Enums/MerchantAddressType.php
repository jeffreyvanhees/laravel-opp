<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum MerchantAddressType: string
{
    case DEFAULT = 'default';
    case MANUALLY = 'manually';
    case INVOICE = 'invoice';
}
