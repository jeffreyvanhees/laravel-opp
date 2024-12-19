<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum MerchantSettlementStatus: string
{
    case CURRENT = 'current';
    case TRANSFER = 'transfer';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
}
