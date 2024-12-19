<?php

namespace JeffreyVanHees\LaravelOpp\Concerns;

use JeffreyVanHees\LaravelOpp\Enums\FilterOperator;
use Saloon\Traits\RequestProperties\HasQuery;

/**
 * @mixin HasQuery
 */
trait Filterable
{
    public function filter(string $name, mixed $value, FilterOperator $operand = FilterOperator::EQ): self
    {
        return $this->where($name, $value, $operand);
    }

    public function where(string $name, mixed $value, FilterOperator $operand = FilterOperator::EQ): self
    {
        return tap($this, fn () => $this->query()->add('filter', array_merge(
            $this->query()->get('filter', []),
            [['name' => $name, 'value' => $operand->format($value), 'operand' => $operand->value]]
        )));
    }
}
