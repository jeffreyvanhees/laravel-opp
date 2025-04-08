<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum MerchantStatus: string
{
    case NEW = 'new';
    case PENDING = 'pending';
    case LIVE = 'live';
    case TERMINATED = 'terminated';
    case SUSPENDED = 'suspended';
    case BLOCKED = 'blocked';
    case DELETED = 'deleted';
}
