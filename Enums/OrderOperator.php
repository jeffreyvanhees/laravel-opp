<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum OrderOperator: string
{
    case ASC = '';
    case DESC = '-';
}
