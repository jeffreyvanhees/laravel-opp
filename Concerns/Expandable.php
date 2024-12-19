<?php

namespace JeffreyVanHees\LaravelOpp\Concerns;

use JeffreyVanHees\LaravelOpp\OnlinePaymentPlatformConnector;

/**
 * @property OnlinePaymentPlatformConnector $connector
 */
trait Expandable
{
    public function expand(string $name): self
    {
        return $this->with($name);
    }

    /**
     * Expand the response objects.
     */
    public function with(string $name): self
    {
        return tap($this, fn () => $this->connector->query()->add('expand', array_merge(
            $this->connector->query()->get('expand', []),
            [$name]
        )));
    }
}
