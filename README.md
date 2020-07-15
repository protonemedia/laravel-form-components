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

* PHP 7.4 + Laravel 7.0 only

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
    @endbind
</x-form>
```

<img src="" width="450" />

## Usage

### Input and textarea elements

The minimum requirement for an `input` or `textarea` is the `name` attribute.

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

### Select elements

Besides the `name` attribute, the `select` element has a required `options` attribute, which should be a simple *key-value* array.

```php
$countries = [
    'be' => 'Belgium',
    'nl' => 'The Netherlands',
];
```

```blade
<x-form-select name="country_code" :options="$countries" />
```

If you want a select element where multiple options can be selected, add the `multiple` attribute to the element. If you specify a default, make sure it is an array. This applies to bound targets as well.

```blade
<x-form-select name="country_code" :options="$countries" multiple :default="['be', 'nl']" />
```

### Checkbox elements

Checkboxes have a default value of `1`, but you can customize it as well.

```blade
<x-form-checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter" />
```

If you have a fieldset of multiple checkboxes, you can group them together with the `form-group` component. This component has an optional `label` attribute and you can set the `name` as well. This is a great way to handle the validation of arrays. If you disable the errors on the individual checkboxes, it will one show the validation errors once. The `form-group` component has a `show-errors` attribute that defaults to `true`.

```blade
<x-form-group name="interests" label="Pick one or more interests">
    <x-form-checkbox name="interests[]" :show-errors="false" value="laravel" label="Laravel" />
    <x-form-checkbox name="interests[]" :show-errors="false" value="tailwindcss" label="Tailwind CSS" />
</x-form-group>
```

### Radio elements

Radio elements behave exactly the same as checkboxes, except the `show-errors` attribute defaults to `false` as you almost always want to wrap multiple radio elements in a `form-group`.

You can group checkbox and radio elements on the same horizontal row by adding an `inline` attribute to the `form-group` element.

```blade
<x-form-group name="notification_channel" label="How do you want to receive your notifications?" inline>
    <x-form-checkbox name="notification_channel" value="mail" label="Mail" />
    <x-form-checkbox name="notification_channel" value="slack" label="Slack" />
</x-form-group>
```

### Old data

*todo*

### Handling translations

*todo*

### Customize the blade views

*todo*

### Customize the components

*todo*

### Prefix the components

*todo*

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
