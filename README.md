# Online Payment Platform for Laravel

This package provides a simple way to interact with the Online Payment Platform API in your Laravel applications.
Please note that this package is not developed by Online Payment Platform itself and by using this package
you agree that the author is not responsible for any damage caused by using this package.

> [!CAUTION]
> This package is still in development and should not be used in production environments. For testing purposes only.

### Requirements

- A Online Payment Platform account.
- PHP >= 8.1
- Laravel >=11.0

### Installation

Add Online Payment Platform for Laravel to your composer file via the composer require command:

composer require jeffreyvanhees/laravel-opp
Or add it to composer.json manually:

```json
{
    "require": {
        "mollie/laravel-mollie": "^3.0"
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

