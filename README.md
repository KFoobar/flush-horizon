# Flush Redis for Laravel Horizon

This package will allow you to better manage the list of failed jobs in Laravel Horizon. 
The package will add two console commands to your Laravel application that lets you flush all failed jobs stored in Redis and/or flush all key stored by Horizon in Redis.

By default Laravel Horizon flushes failed jobs after 7 days, but with this package can you flush them manully via console commands.

## Requirements
- Laravel 8.0 or higher
- Laravel Horizon
- Redis

## Installation

You can install the package via composer:

```
$ composer require kfoobar/flush-horizon
```

## Basic Usage

To flush all failed jobs, use this command:
```
php artisan horizon:flush
```

To flush all data, use this command:
```
php artisan horizon:flush
```

## Contributing

Contributions are welcome!

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
