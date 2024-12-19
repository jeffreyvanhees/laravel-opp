<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Resources;

use JeffreyVanHees\LaravelOpp\OnlinePaymentPlatformConnector;

class BaseResource
{
    public function __construct(protected OnlinePaymentPlatformConnector $connector)
    {
        //
    }
}
