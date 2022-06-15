# Blade Bootstrap Components


[![Latest Version on Packagist](https://img.shields.io/packagist/v/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/hostmoz/blade-bootstrap-components)
[![Build Status](https://img.shields.io/travis/hostmoz/blade-bootstrap-components/master.svg?style=flat-square)](https://travis-ci.org/hostmoz/blade-bootstrap-components)
[![Quality Score](https://img.shields.io/scrutinizer/g/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://scrutinizer-ci.com/g/hostmoz/blade-bootstrap-components)
[![Total Downloads](https://img.shields.io/packagist/dt/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/hostmoz/blade-bootstrap-components)

A new set of Blade components to rapidly build forms with  [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

## Features

* Components for major Bootstrap components, including forms.
* Component logic independent from Blade views.
* Bind a target to a form (or a set of elements) to provide default values.
* Re-populate forms with [old input](https://laravel.com/docs/master/requests#old-input).
* Validation errors.
* [Form method spoofing](https://laravel.com/docs/master/routing#form-method-spoofing).
* Components classes and Blade views fully customizable.
* Support for prefixing the components.

## Requirements

* PHP 7.4 + Laravel 8+

## Installation

You can install the package via composer:

```bash
composer require hostmoz/blade-bootstrap-components
```
## Publishing Assets

For some components to work correctly(ex: date-picker) you will need to publish the package assets using the command below:

```bash
php artisan vendor:publish --tag=bootstrap-assets --force
```

## Configuration

There is no configuration needed unless you want to [customize the Blade views and components](#customize-the-blade-views).

## Quick example

```blade
<x-bootstrap::form.form>
    <div class="row">
        <div class="col-12 mb-3">
            <x-bootstrap::form.input name="name" label="Your Name" />
        </div>
        <div class="col-12 mb-3">
            <x-bootstrap::form.select name="country_code" :options="$countries" label="Select a Country"/>
        </div>
        <div class="col-12 mb-3">
            <x-bootstrap::form.date-picker name="teste" label="Pick a Date"/>
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <!-- Inline radio inputs -->
            <x-bootstrap::form.group name="newsletter_frequency" label="Newsletter frequency" inline>
                <x-bootstrap::form.radio name="newsletter_frequency" value="daily" label="Daily" />
                <x-bootstrap::form.radio name="newsletter_frequency" value="weekly" label="Weekly" />
            </x-bootstrap::form.group>
        </div>
        <div class="col-6">
            <x-bootstrap::form.group>
                <x-bootstrap::form.checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter" />
                <x-bootstrap::form.checkbox name="agree_terms" label="Agree with terms" />
            </x-bootstrap::form.group>
        </div>
    </div>
</x-bootstrap::form.form>
```

<img src="https://raw.githubusercontent.com/hostmoz/blade-bootstrap-components/main/resources/screenshot.png" width="450px"/>

## Usage


### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email elisio.leonardo@gmail.com instead of using the issue tracker.

## Credits

- [Elísio Leonardo](https://github.com/backstageel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
