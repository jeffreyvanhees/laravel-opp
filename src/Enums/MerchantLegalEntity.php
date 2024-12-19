<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum MerchantLegalEntity: string
{
    case ZZP = 'zzp';
    case EMZ = 'emz';
    case VOF = 'vof';
    case MTS = 'mts';
    case CV = 'cv';
    case BV = 'bv';
    case NV = 'nv';
    case COOP = 'co-op';
    case VNG = 'vng';
    case STG = 'stg';
}
