<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum TestAmount: int
{
    case CREATED = 101;
    case PENDING = 201;
    case EXPIRED = 301;
    case CANCELLED = 401;
    case COMPLETED = 501;
    case CHARGEBACK = 601;
    case FAILED = 701;
    case REFUNDED = 801;
    case RESERVED = 901;
    case PLANNED = 1201;
}
