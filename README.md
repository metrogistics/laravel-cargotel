This package provides an easy way to interface with Cargotel's API.

## Dependencies

This package requires `pstephan1187/laravel-guzzler` to be installed.

https://github.com/pstephan1187/laravel-guzzler

## Installation

```
composer require pstephan1187/laravel-cargotel
```

Add the service provider to your `config/app.php` file:

```
Cargotel\CargotelServiceProvider::class,
```

Optionally, add the facade to your `config/app.php` file:

```
"Cargotel" => Cargotel\Facades\Cargotel::class,
```

Make sure that you have the following `.env` configuration keys set:

 * CARGOTEL_USERNAME
 * CARGOTEL_PASSWORD
 * CARGOTEL_BASE_URI

## Usage

You can make calls to cargotel using either the helper or the facade:

```
cargotel()->setOrderDueDate(...);
Cargotel::setOrderDueDate(...);
```

## Methods

### `setOrderEta`

Sets the given order's ETA. The `$datetime` argument can be anything
parsable by the `Carbon::parse()` method.

```
setOrderEta($order_id, $datetime, $timezone = 'UTC')
```

### `setOrderDueDate`

Sets the given order's due date. The `$datetime` argument can be anything
parsable by the `Carbon::parse()` method.

```
setOrderDueDate($order_id, $datetime, $timezone = 'UTC')
```
