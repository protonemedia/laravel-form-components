# [WIP] Laravel Form Components

[![Latest Version on Packagist](https://img.shields.io/packagist/v/protonemedia/laravel-form-components.svg?style=flat-square)](https://packagist.org/packages/protonemedia/laravel-form-components)
[![Build Status](https://img.shields.io/travis/pascalbaljetmedia/laravel-form-components/master.svg?style=flat-square)](https://travis-ci.org/pascalbaljetmedia/laravel-form-components)
[![Quality Score](https://img.shields.io/scrutinizer/g/pascalbaljetmedia/laravel-form-components.svg?style=flat-square)](https://scrutinizer-ci.com/g/pascalbaljetmedia/laravel-form-components)
[![Total Downloads](https://img.shields.io/packagist/dt/protonemedia/laravel-form-components.svg?style=flat-square)](https://packagist.org/packages/protonemedia/laravel-form-components)

## Features

* Components for input, textarea, select, multi-select, checkbox and radio elements
* Support for [Tailwind CSS Custom Forms](https://tailwindcss-custom-forms.netlify.app)
* Re-populate form with [old input](https://laravel.com/docs/master/requests#old-input)
* Validation errors
* Bind a target to a form (or a set of elements) to provide default values
* Support for Spatie's [laravel-translatable](https://github.com/spatie/laravel-translatable)
* Components classes and Blade views fully customizable
* Support for prefixing the components
* Prepared for other CSS frameworks as well (future release)

## Requirements

* PHP 7.4+
* Laravel 6.0 / 7.0

## Installation

You can install the package via composer:

```bash
composer require protonemedia/laravel-form-components
```

## Configuration

todo

## Quick example

```blade
<x-form>
    @bind($user)
        <x-form-input name="last_name" label="Last Name" />
        <x-form-select name="country_code" :options="$options" />
        <x-form-select name="interests" :options="$multiOptions" label="Select your interests" multiple />

        <!-- \Spatie\Translatable\HasTranslations -->
        <x-form-textarea name="biography" language="nl" placeholder="Dutch Biography" />
        <x-form-textarea name="biography" language="en" placeholder="English Biography" />

        <x-form-checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter" />

        <!-- Inline radio inputs -->
        <x-form-group name="newsletter_frequency" label="Newsletter frequency">
            <x-form-radio name="newsletter_frequency" value="daily" label="Daily" />
            <x-form-radio name="newsletter_frequency" value="weekly" label="Weekly" />
        </x-form-group>

        <x-form-submit />
    @endbind
</x-form>
```

## Usage

### Input and textarea elements

The minimum requirement for an `input` or `textarea` is a `name` attribute.

```blade
<x-form-input name="company_name" />
```

Optionally you can add a `label` attribute, which can be computed as well.

```blade
<x-form-input name="company_name" label="Company name" />
<x-form-input name="company_name" :label="trans('forms.company_name')" />
```

You can also choose to use a `placeholder` instead of a label, and of course you can change the `type` of the element.

```blade
<x-form-input type="email" name="current_email" placeholder="Current email address" />
```

By default every element shows validation errors but you can hide them if you want.

```blade
<x-form-textarea name="description" :show-errors="false" />
```

### Default value

You can use the `default` attribute to specify the default value of the element.

```blade
<x-form-textarea name="motivation" default="I want to use this package because..." />
```

### Binding a target

Instead of setting a default value, you can also pass in a target, like an Eloquent model. Now the component will get the value from the target by the `name`.

```blade
<x-form-textarea name="description" :bind="$video" />
```

In the example above, where `$video` is an Eloquent model, the default value will be `$video->description`.

### Binding a target to multiple elements

You can also bind a target by using the `@bind` directive. This will bind the target to all elements until the `@endbind` directive.

```blade
<x-form>
    @bind($video)
        <x-form-input name="title" label="Title" />
        <x-form-textarea name="description" label="Description" />
    @endbind
</x-form>
```

You can even mix targets!

```blade
<x-form>
    @bind($user)
        <x-form-input name="full_name" label="Full name" />

        @bind($userProfile)
            <x-form-textarea name="biography" label="Biography" />
        @endbind

        <x-form-input name="email" label="Email address" />
    @endbind
</x-form>
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email pascal@protone.media instead of using the issue tracker.

## Credits

- [Pascal Baljet](https://github.com/protonemedia)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
