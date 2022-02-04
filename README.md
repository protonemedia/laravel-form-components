# Laravel Form Components

[![Latest Version on Packagist](https://img.shields.io/packagist/v/protonemedia/laravel-form-components.svg?style=flat-square)](https://packagist.org/packages/protonemedia/laravel-form-components)
[![Build Status](https://img.shields.io/travis/protonemedia/laravel-form-components/master.svg?style=flat-square)](https://travis-ci.org/protonemedia/laravel-form-components)
[![Total Downloads](https://img.shields.io/packagist/dt/protonemedia/laravel-form-components.svg?style=flat-square)](https://packagist.org/packages/protonemedia/laravel-form-components)
[![Buy us a tree](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen)](https://plant.treeware.earth/protonemedia/laravel-form-components)

A set of Blade components to rapidly build forms with [Tailwind CSS v1](https://tailwindcss-custom-forms.netlify.app), [Tailwind CSS v2](https://tailwindcss-forms.vercel.app), [Bootstrap 4](https://getbootstrap.com/docs/4.0/components/forms/) and [Bootstrap 5](https://getbootstrap.com/docs/5.1/forms/overview/). Supports validation, model binding, default values, translations, includes default vendor styling and fully customizable!

## Launcher 🚀

Hey! We've built a Docker-based deployment tool to launch apps and sites fully containerized. You can find all features and the roadmap on our [website](https://uselauncher.com), and we are on [Twitter](https://twitter.com/uselauncher) as well!

## Features

### 📺 Want to see this package in action? Join the live stream on November 19 at 14:00 CET: [https://youtu.be/7eNZS4U7xyM](https://youtu.be/7eNZS4U7xyM)

* Components for input, textarea, select, multi-select, checkbox and radio elements.
* Support for Tailwind v1 with [Tailwind CSS Custom Forms](https://tailwindcss-custom-forms.netlify.app).
* Support for Tailwind v2 with [Tailwind Forms](https://tailwindcss-forms.vercel.app/).
* Support for [Bootstrap 4 Forms](https://getbootstrap.com/docs/4.6/components/forms/).
* Support for [Bootstrap 5 Forms](https://getbootstrap.com/docs/5.1/forms/overview/).
* Component logic independent from Blade views, the Tailwind and Bootstrap views use the same logic.
* Bind a target to a form (or a set of elements) to provide default values (model binding).
* Support for [Laravel Livewire](https://laravel-livewire.com) v2.
* Support for Spatie's [laravel-translatable](https://github.com/spatie/laravel-translatable).
* Re-populate forms with [old input](https://laravel.com/docs/master/requests#old-input).
* Validation errors.
* [Form method spoofing](https://laravel.com/docs/master/routing#form-method-spoofing).
* Components classes and Blade views fully customizable.
* Support for prefixing the components.

Looking for Inertia/Vue.js support? Check out [Form Components Pro](https://github.com/protonemedia/form-components-pro)

## Requirements

* PHP 7.4 or higher
* Laravel 8.0 or 9.0

## Support

We proudly support the community by developing Laravel packages and giving them away for free. Keeping track of issues and pull requests takes time, but we're happy to help! If this package saves you time or if you're relying on it professionally, please consider [supporting the maintenance and development](https://github.com/sponsors/pascalbaljet).

## Installation

You can install the package via composer:

```bash
composer require protonemedia/laravel-form-components
```

If you're using Tailwind, make sure the right plugin ([v1](https://github.com/tailwindcss/custom-forms#install) or [v2](https://github.com/tailwindlabs/tailwindcss-forms#installation)) is installed and configured.

## Quick example

```blade
<x-form>
    @bind($user)
        <x-form-input name="last_name" label="Last Name" />
        <x-form-select name="country_code" :options="$options" />
        <x-form-select name="interests[]" :options="$multiOptions" label="Select your interests" multiple />

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

<img src="https://github.com/protonemedia/laravel-form-components/blob/master/quick-example-form.png?raw=true" width="450"  alt="Quick example form"/>

## Preface

At first sight, generating HTML forms with PHP looks great. PHP's power can make it less repetitive, and it's nice to resolve input values and validation states right from your PHP code. Still, it gets harder to keep your PHP code clean and neat whenever your forms get more complex. Often you end up with lots of custom code, writing extensions, and overriding defaults, just for the sake of adding some small thing to your form.

After years of trying all sorts of form builders, it feels like just writing most of the form in HTML is the most versatile solution. You can add helper texts, icons, tooltips, popovers, custom sections, and JavaScript integrations however and wherever you like. The power of [Laravel Blade Components](https://laravel.com/docs/8.x/blade) allows us to add all kinds of features without bringing the whole form-building process into PHP.

Let's take a look at this `x-form` example. The `action` attribute is optional, but you can pass a hard-coded, primitive value to the component using a simple HTML attribute. Likewise, PHP expressions and variables can be passed to attributes using the `:` prefix. Do you need Alpine.js or VueJS directives? No problem!

```blade
<x-form action="/api/user">
    <!-- ... -->
</x-form>
```

```blade
<x-form :action="route('api.user.store')" v-on:submit="checkForm">
    <!-- ... -->
</x-form>
```

## Configuration

You can switch frameworks by updating the `framework` setting in the `form-components.php` configuration file. Check out the [customization section](#customize-the-blade-views) on publishing the configuration and view files. If you're using the [Livewire Stack with Laravel Jetstream](https://jetstream.laravel.com/2.x/stacks/livewire.html), you probably want to set the `framework` configuration key to `tailwind-forms-simple`.

```php
return [
    'framework' => 'bootstrap-4',
];
```

No further configuration is needed unless you want to [customize the Blade views and components](#customize-the-blade-views).

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

By default, every element shows validation errors, but you can hide them if you want.

```blade
<x-form-textarea name="description" :show-errors="false" />
```

### Default value and binds

You can use the `default` attribute to specify the default value of the element.

```blade
<x-form-textarea name="motivation" default="I want to use this package because..." />
```

#### Binding a target

Instead of setting a default value, you can also pass in a target, like an Eloquent model. Now the component will get the value from the target by the `name`.

```blade
<x-form-textarea name="description" :bind="$video" />
```

In the example above, where `$video` is an Eloquent model, the default value will be `$video->description`.

#### Date Casting

If you use Eloquent's [Date Casting](https://laravel.com/docs/8.x/eloquent-mutators#date-casting) feature, you can use the date attributes in your forms by setting the `use_eloquent_date_casting` configuration key to `true`. For compatibility reasons, this is disabled by default.

```php
return [
    'use_eloquent_date_casting' => true,
];
```

You can either use the `dates` property or the `casts` property in your Eloquent model to specify date attributes:

```php
class ActivityModel extends Model
{
    public $dates = ['finished_at'];

    public $casts = [
        'started_at'   => 'date',
        'failed_at'    => 'datetime',
        'completed_at' => 'date:d-m-Y',
        'skipped_at'   => 'datetime:Y-m-d H:i',
    ];
}
```

```blade
<x-form-input name="completed_at" :bind="$activity" />
```

In the example above, the default value will be formatted like `31-10-2021`.

#### Binding a target to multiple elements

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

#### Override or remove a binding

You can override the `@bind` directive by passing a target directly to the element using the `:bind` attribute. If you want to remove a binding for a specific element, pass in `false`.

```blade
<x-form>
    @bind($video)
        <x-form-input name="title" label="Title" />
        <x-form-input :bind="$videoDetails" name="subtitle" label="Subtitle" />
        <x-form-textarea :bind="false" name="description" label="Description" />
    @endbind
</x-form>
```

#### Laravel Livewire

You can use the `@wire` and `@endwire` directives to bind a form to a Livewire component. Let's take a look at the `ContactForm` example from the official Livewire documentation.

```php
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
        ]);

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
```

Normally you would use a `wire:model` attribute to bind a component property with a form element. By using the `@wire` directive, this package will automatically add the `wire:model` attribute.

```blade
<x-form wire:submit.prevent="submit">
    @wire
        <x-form-input name="name" />
        <x-form-input name="email" />
    @endwire

    <x-form-submit>Save Contact</x-form-submit>
</x-form>
```

Additionally, you can pass an optional modifier to the `@wire` directive. This feature was added in v2.4.0. If you're upgrading from a previous version *and* you published the Blade views, you should republish them *or* update them manually.

```blade
<x-form wire:submit.prevent="submit">
    @wire('debounce.500ms')
        <x-form-input name="email" />
    @endwire
</x-form>
```

It's also possible to use the `wire:model` attribute by default. You may set the `default_wire` configuration setting to `true` or a modifier like `debounce.500ms`. This way, you don't need the `@wire` and `@endwire` directives in your views. You may still override the default setting by using the `@wire` directive, or by manually adding the `wire:model` attribute to a form element.

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

You can provide a *slot* to the `select` element as well:

```blade
<x-form-select name="country_code">
   <option value="be">Belgium</option>
   <option value="nl">The Netherlands</option>
</x-form-select>
```

If you want a select element where multiple options can be selected, add the `multiple` attribute to the element. If you specify a default, make sure it is an array. This applies to bound targets as well.

```blade
<x-form-select name="country_code[]" :options="$countries" multiple :default="['be', 'nl']" />
```

You may add a `placeholder` attribute to the select element. This will prepend a disabled option.

This feature was added in v3.2.0. If you're upgrading from a previous version *and* you published the Blade views, you should republish them *or* update them manually.

```blade
<x-form-select name="country_code" placeholder="Choose..." />
```

Rendered HTML:

```html
<select>
    <option value="" disabled>Choose...</option>
    <!-- other options... -->
</select>
```

#### Using Eloquent relationships

This package has built-in support for `BelongsToMany`, `MorphMany`, and `MorphToMany` relationships. To utilize this feature, you must add both the `multiple` and `many-relation` attribute to the select element.

In the example below, you can attach one or more tags to the bound video. By using the `many-relation` attribute, it will correctly retrieve the selected options (attached tags) from the database.

```blade
<x-form>
    @bind($video)
        <x-form-select name="tags[]" :options="$tags" multiple many-relation />
    @endbind
</x-form>
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
    <x-form-radio name="notification_channel" value="mail" label="Mail" />
    <x-form-radio name="notification_channel" value="slack" label="Slack" />
</x-form-group>
```

When you're not using target binding, you can use the `default` attribute to mark a radio element as checked:


```blade
<x-form-group name="notification_channel" label="How do you want to receive your notifications?">
    <x-form-radio name="notification_channel" value="mail" label="Mail" default />
    <x-form-radio name="notification_channel" value="slack" label="Slack" />
</x-form-group>
```

### Old input data

When a validation errors occurs and Laravel redirects you back, the form will be re-populated with the old input data. This old data will override any binding or default value.

### Handling translations

This package supports `spatie/laravel-translatable` out of the box. You can add a `language` attribute to your element.

```blade
<x-form-input name="title" language="en" :bind="$book" />
```

This will result in the following HTML:

```html
<input name="title[en]" value="Laravel: Up & Running" />
```

To get the validation errors from the session, the name of the input will be mapped to a *dot* notation like `title.en`. This is how old input data is handled as well.

### Customize the blade views

Publish the configuration file and Blade views with the following command:

```bash
php artisan vendor:publish --provider="ProtoneMedia\LaravelFormComponents\Support\ServiceProvider"
```

You can find the Blade views in the `resources/views/vendor/form-components` folder. Optionally, in the `form-components.php` configuration file, you can change the location of the Blade view *per* component.

#### Component logic

You can bind your own component classes to any of the elements. In the `form-components.php` configuration file, you can change the class *per* component. As the logic for the components is quite complex, it is strongly recommended to duplicate the default component as a starting point and start editing. You'll find the default component classes in the `vendor/protonemedia/laravel-form-components/src/Components` folder.

### Prefix the components

You can define a prefix in the `form-components.php` configuration file.

```php
return [
    'prefix' => 'tailwind',
];
```

Now all components can be referenced like so:

```blade
<x-tailwind-form>
    <x-tailwind-form-input name="company_name" />
</x-tailwind-form>
```

### Error messages

By the default, the errors messages are positioned under the element. To show these messages, we created a `FormErrors` component. You can manually use this component as well. The element takes an optional `bag` attribute to specify the `ErrorBag`, which defaults to `default`.

```blade
<x-form>
    <x-form-input name="company_name" :show-errors="false" />

    <!-- other elements -->

    <x-form-errors name="company_name" />

    <x-form-errors name="company_name" bag="register" />
</x-form>
```

### Submit button

The label defaults to *Submit*, but you can use the slot to provide your own content.

```blade
<x-form-submit>
    <span class="text-green-500">Send</span>
</x-form-submit>
```

### Bootstrap

You can switch to [Bootstrap 4](https://getbootstrap.com/docs/4.0/components/forms/) or [Bootstrap 5](https://getbootstrap.com/docs/5.0/forms/overview/) by updating the `framework` setting in the `form-components.php` configuration file.

```php
return [
    'framework' => 'bootstrap-5',
];
```

There is a little of styling added to the `form.blade.php` view to add support for inline form groups. If you want to change it or remove it, [publish the assets](#customize-the-blade-views) and update the view file.

Bootstrap 5 changes a lot regarding forms. If you migrate from 4 to 5, make sure to read the migration logs about [forms](https://getbootstrap.com/docs/5.0/migration/#forms).

#### Input group / prepend and append

In addition to the Tailwind features, with Bootstrap 4, there is also support for [input groups](https://getbootstrap.com/docs/4.6/components/forms/). Use the `prepend` and `append` slots to provide the contents.

```blade
<x-form-input name="username" label="Username">
    @slot('prepend')
        <span>@</span>
    @endslot
</x-form-input>

<x-form-input name="subdomain" label="Subdomain">
    @slot('append')
        <span>.protone.media</span>
    @endslot
</x-form-input>
```

With Bootstrap 5, the [input groups](https://getbootstrap.com/docs/5.0/forms/input-group/) have been simplified. You can add as many items as you would like in any order you would like. Use the `form-input-group-text` component to add text or [checkboxes](https://getbootstrap.com/docs/5.0/forms/input-group/#checkboxes-and-radios).

```blade
<x-form-input-group label="Profile" >
    <x-form-input name="name" placeholder="Name" id="name" />
    <x-form-input-group-text>@</x-form-input-group-text>
    <x-form-input name="nickname" placeholder="Nickname" id="nickname" />
    <x-form-submit />
</x-form-input-group>
```

#### Floating labels

As of Bootstrap 5, you can add [floating labels](https://getbootstrap.com/docs/5.0/forms/floating-labels/) by adding the `floating` attribute to inputs, selects (excluding `multiple`), and textareas.

```blade
<x-form-input label="Floating Label" name="float_me" id="float_me" floating />
```

#### Help text

You can add [block-level help text](https://getbootstrap.com/docs/4.6/components/forms/#help-text) to any element by using the `help` slot.

```blade
<x-form-input name="username" label="Username">
    @slot('help')
        <small class="form-text text-muted">
            Your username must be 8-20 characters long.
        </small>
    @endslot
</x-form-input>
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Other Laravel packages

* [`Laravel Analytics Event Tracking`](https://github.com/protonemedia/laravel-analytics-event-tracking): Laravel package to easily send events to Google Analytics.
* [`Laravel Blade On Demand`](https://github.com/protonemedia/laravel-blade-on-demand): Laravel package to compile Blade templates in memory.
* [`Laravel Cross Eloquent Search`](https://github.com/protonemedia/laravel-cross-eloquent-search): Laravel package to search through multiple Eloquent models.
* [`Laravel Eloquent Scope as Select`](https://github.com/protonemedia/laravel-eloquent-scope-as-select): Stop duplicating your Eloquent query scopes and constraints in PHP. This package lets you re-use your query scopes and constraints by adding them as a subquery.
* [`Laravel Eloquent Where Not`](https://github.com/protonemedia/laravel-eloquent-where-not): This Laravel package allows you to flip/invert an Eloquent scope, or really any query constraint.
* [`Laravel FFMpeg`](https://github.com/protonemedia/laravel-ffmpeg): This package provides an integration with FFmpeg for Laravel. The storage of the files is handled by Laravel's Filesystem.
* [`Laravel Paddle`](https://github.com/protonemedia/laravel-paddle): Paddle.com API integration for Laravel with support for webhooks/events.
* [`Laravel Verify New Email`](https://github.com/protonemedia/laravel-verify-new-email): This package adds support for verifying new email addresses: when a user updates its email address, it won't replace the old one until the new one is verified.
* [`Laravel WebDAV`](https://github.com/protonemedia/laravel-webdav): WebDAV driver for Laravel's Filesystem.

### Security

If you discover any security related issues, please email pascal@protone.media instead of using the issue tracker.

## Credits

- [Pascal Baljet](https://github.com/protonemedia)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

This package is [Treeware](https://treeware.earth). If you use it in production, then we ask that you [**buy the world a tree**](https://plant.treeware.earth/pascalbaljetmedia/laravel-form-components) to thank us for our work. By contributing to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.
