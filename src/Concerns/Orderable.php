<?php

namespace JeffreyVanHees\LaravelOpp\Concerns;

use JeffreyVanHees\LaravelOpp\Enums\OrderOperator;
use JeffreyVanHees\LaravelOpp\OnlinePaymentPlatformConnector;

/**
 * @property OnlinePaymentPlatformConnector $connector
 */
trait Orderable
{
    /**
     * Add an order condition to the request.
     */
    public function order(string $name, OrderOperator $orderOperator = OrderOperator::ASC): self
    {
        return tap($this, fn () => $this->connector->query()->add('order', sprintf('%s%s', $orderOperator->value, $name)));
    }
}
