# Blade Bootstrap Components


[![Latest Version on Packagist](https://img.shields.io/packagist/v/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/hostmoz/blade-bootstrap-components)
[![Build Status](https://img.shields.io/travis/hostmoz/blade-bootstrap-components/master.svg?style=flat-square)](https://travis-ci.org/hostmoz/blade-bootstrap-components)
[![Quality Score](https://img.shields.io/scrutinizer/g/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://scrutinizer-ci.com/g/hostmoz/blade-bootstrap-components)
[![Total Downloads](https://img.shields.io/packagist/dt/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/hostmoz/blade-bootstrap-components)

A new set of Blade components to rapidly build forms with  [Bootstrap 4](https://getbootstrap.com/docs/4.0/components/forms/).

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

## Configuration

There is no configuration needed unless you want to [customize the Blade views and components](#customize-the-blade-views).

## Quick example

```blade
<x-form>
        <x-form-input name="name" label="Your Name" />
        <x-form-select name="country_code" :options="$options" />
        <x-form-select name="interests" :options="$multiOptions" label="Select your interests" multiple />

        <!-- \Spatie\Translatable\HasTranslations -->
        <x-form-textarea name="biography" language="nl" placeholder="Dutch Biography" />
        <x-form-textarea name="biography" language="en" placeholder="English Biography" />

        <!-- Inline radio inputs -->
        <x-form-group name="newsletter_frequency" label="Newsletter frequency" inline>
            <x-form-radio name="newsletter_frequency" value="daily" label="Daily" />
            <x-form-radio name="newsletter_frequency" value="weekly" label="Weekly" />
        </x-form-group>

        <x-form-group>
            <x-form-checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter" />
            <x-form-checkbox name="agree_terms" label="Agree with terms" />
        </x-form-group>

        <x-form-submit />
</x-form>
```

<img src="" width="450" />

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

- This package was inspired by https://github.com/protonemedia/laravel-form-components

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
