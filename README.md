# Online Payment Platform for Laravel

This package provides a simple way to interact with the Online Payment Platform API in your Laravel applications.
Please note that this package is not developed by Online Payment Platform itself and by using this package
you agree that the author is not responsible for any damage caused by using this package.

Visit the Online Payment Platform [website](https://onlinepaymentplatform.com/) for more information or read
the API documentation [here](https://docs.onlinepaymentplatform.com/).

> [!CAUTION]
> This package is still in development and should not be used in production environments. For testing purposes only.

### Requirements

- A Online Payment Platform account.
- PHP >= 8.1
- Laravel >=11.0

### Installation

Add Online Payment Platform for Laravel to your composer file via the composer require command:

```bash
composer require jeffreyvanhees/laravel-opp
```

Or add it to composer.json manually:

```json
{
    "require": {
        "jeffreyvanhees/laravel-opp": "@dev"
    }
}
```

The service providers will be automatically registered using Laravel's auto-discovery feature.

### Configuration

Add the following to your `config/services.php` file:

```php
'opp' => [
    'url' => env('OPP_URL'),
    'api_key' => env('OPP_API_KEY'),
    'notification_secret' => env('OPP_NOTIFICATION_SECRET'),
    'return_url' => env('OPP_RETURN_URL'),
    'notify_url' => env('OPP_NOTIFY_URL'),
],
```

And add the corresponding values to your `.env` file:

```env
OPP_URL=https://api.onlinepaymentplatform.com
OPP_API_KEY=your-api-key
OPP_NOTIFICATION_SECRET=your-notification-secret
OPP_RETURN_URL=your-return-url
OPP_NOTIFY_URL=your-notify-url
```

## Example

### List merchants

This will automatically fetch all merchants and return a collection. It will also handle pagination
so when you take 100 merchants, it will fetch every next page until it has 100 merchants.

```php


$merchants = OnlinePaymentPlatformConnector::make()
    ->merchants()
    ->paginate()
    ->collect()
    ->take(20);
```

### Create a merchant

This will create a new merchant with the given data. The data is first validated by the package itself and then
sent to the Online Payment Platform API. The response is then returned as a JSON object. You can also use `->dto()`
instead of `->json()` to get a data transfer object.

```php
$merchant = OnlinePaymentPlatformConnector::make()
    ->merchants()
    ->create([
        'type' => 'consumer',
        'name' => 'Test Merchant',
        'email' => 'test@email.com',
        'phone' => '1234567890',
    ])
    ->json();
```

Result (stripped unrelated data):

```json
{
    "uid": "mer_f14eb0123d92f",
    "object": "merchant",
    "created": 1734616763,
    "updated": 1734616763,
    "status": "pending",
    "compliance": {
        "level": 100,
        "status": "verified",
        "overview_url": "https://sandbox.onlinebetaalplatform.nl/xxxxxx",
        "requirements": []
    },
    "type": "consumer",
    "name_first": "John",
    "name_last": "Doe",
    "phone": "1234567890",
    "email": "test@email.com",
    "country": "nld",
    "addresses": [],
    "notify_url": "https://emeals.jeffreyvanhees.nl/api/hooks/opp",
    "return_url": null,
    "metadata": []
}
```
