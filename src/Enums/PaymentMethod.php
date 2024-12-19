<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Enums;

enum PaymentMethod: string
{
    case APPLE_PAY = 'apple-pay';
    case BANCONTACT = 'bancontact';
    case BCMC = 'bcmc';
    case CREDITCARD = 'creditcard';
    case GIROPAY = 'giropay';
    case IDEAL = 'ideal';
    case MYBANK = 'mybank';
    case PAYPAL = 'paypal';
    case PAYPAL_PC = 'paypal-pc';
    case PAYPAL_PPCP = 'paypal-ppcp';
    case PI_SINGLE = 'pi-single';
    case SOFORT_BANKING = 'sofort-banking';
}
