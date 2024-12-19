<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

use BackedEnum;

enum FilterOperator: string
{
    case LT = 'lt';
    case LTE = 'lte';
    case GT = 'gt';
    case GTE = 'gte';
    case IN = 'in';
    case NOT_IN = 'notin';
    case NULL = 'null';
    case NOT_NULL = 'notnull';
    case EQ = 'eq';
    case NOT_EQUALS = 'notequals';
    case BETWEEN = 'between';

    public function format($value): string
    {
        if (is_array($value)) {
            return collect($value)->map(fn ($v) => $this->format($v))->implode(',');
        }

        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        return (string) $value;
    }
}
