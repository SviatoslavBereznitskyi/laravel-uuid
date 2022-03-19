# Laravel UUID

**This package is a fork of nevadskiy/laravel-uuid.**

[![Latest Stable Version](https://poser.pugx.org/nevadskiy/laravel-uuid/v)](https://packagist.org/packages/nevadskiy/laravel-uuid)
![Tests](https://github.com/nevadskiy/laravel-uuid/workflows/Tests/badge.svg)
![Code Coverage](https://codecov.io/gh/nevadskiy/laravel-uuid/branch/master/graphs/badge.svg?branch=master)
[![License](https://poser.pugx.org/nevadskiy/laravel-uuid/license)](https://packagist.org/packages/nevadskiy/laravel-uuid)

The package provides UUID keys functionality for Eloquent models with one single trait.

More about using UUID as [primary keys](https://tomharrisonjr.com/uuid-or-guid-as-primary-keys-be-careful-7b2aa3dcb439).


## Usage

Add a trait to your model, and it will automatically set the UUID during model creation.

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nevadskiy\Uuid\Uuid;

class Book extends Model
{
    use Uuid;
}
```

Update your migrations to specify UUID type for a primary key.

```php
Schema::create('books', function (Blueprint $table) {
    $table->uuid('id')->primary();
});
```


## Installation

Install a package via composer.

```
composer require imcity-tech/laravel-uuid
```


## Requirements

- Laravel `9.0` or newer
- PHP `8.0` or newer


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Any contribution is **Welcome**.

Please see [CONTRIBUTING](CONTRIBUTING.md) for more information.


## Security

If you discover any security related issues, please [e-mail me](mailto:nevadskiy@gmail.com) instead of using the issue tracker.


## License

The MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.
