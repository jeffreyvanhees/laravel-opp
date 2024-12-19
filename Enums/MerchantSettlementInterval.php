<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum MerchantSettlementInterval: string
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';
    case CONTINUOUS = 'continuous';
}
