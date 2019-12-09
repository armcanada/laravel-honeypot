# Summary

Protects your Laravel application by the use of honeypot.

## Installation

You can install the package via composer:

```bash
composer require armcanada/laravel-honeypot
```

## Usage

Use the provided middleware to enable honeypot verification like so:

``` php
Route::post('/register', 'Auth\RegisterController@register')->middleware('verify-honeypot:field-name'); // Replace field name with your own provided input name
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email aduhaime@armcanada.ca instead of using the issue tracker.

## Credits

- [Anthony Duhaime](https://github.com/armcanada)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
