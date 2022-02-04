# Changelog

All notable changes to `laravel-form-components` will be documented in this file

## 3.6.0 - 2022-02-04

- Support for Laravel 9

## 3.5.1 - 2022-01-05

- Fix for falsy default select values
- Fix for overriding the `default_wire` configuration with a `@wire` directive

## 3.5.0 - 2022-01-05

- Added `default_wire` configuration
- Fix for overriding `wire:model` attribute

## 3.4.0 - 2022-01-04

- Added `tailwind-forms-simple` views

## 3.3.1 - 2021-12-22

- Ensure nested properties uses dot notation

## 3.3.0 - 2021-12-19

- Support for PHP 8.1
- Dropped support for Laravel 7

## 3.2.0 - 2021-11-01

- Support for `select` placeholder

## 3.1.0 - 2021-11-01

- Support for Date Casting
- Support for checkboxes where the bound value is Arrayable
- Bugfix for default `0` values
- Bootstrap 4 validation structure fix

## 3.0.1 - 2021-09-08

- Added name attribute when element is wired

## 3.0.0 - 2021-09-08

- Support for Bootstrap 5

## 2.5.4 - 2020-02-15

- Bugfix for old nested data

## 2.5.3 - 2020-02-11

- Bugfix for setting radio elements as checked/default

## 2.5.2 - 2020-01-04

- Generate ID by name *and* value (checkbox and radio elements only)

## 2.5.1 - 2020-12-22

- Use the `name` attribute to auto-generate an ID (if not set)

## 2.5.0 - 2020-12-22

- Support for `BelongsToMany`, `MorphMany`, and `MorphToMany` relationships (select element)

## 2.4.0 - 2020-12-11

- Support for Livewire modifiers

## 2.3.0 - 2020-12-01

- Support for PHP 8.0
- Dropped support for Livewire v1

## 2.2.0 - 2020-11-25

- Support for Tailwind CSS 2.0 with the Tailwind Forms plugin

## 2.1.2 - 2020-10-21

- Bugfix for multiple checkbox/radio elements with the same name

## 2.1.1 - 2020-09-28

- Bugfix for select options with numeric keys

## 2.1.0 - 2020-09-14

- Select elements now support a slot

## 2.0.0 - 2020-09-09

- Added sensible 'for' attributes to the Bootstrap 4 Label components.

## 1.4.1 - 2020-09-09

- Support for Laravel Livewire 2.0

## 1.4.0 - 2020-09-09

- Support for Laravel 8.0

## 1.3.0 - 2020-08-20

- Form method spoofing to support PUT, PATCH and DELETE actions.

## 1.2.1 - 2020-08-17

- Translation with custom bind bugfix

## 1.2.0 - 2020-08-01

- Validation support for Laravel Livewire
- Make hidden inputs visually hidden

## 1.1.0 - 2020-07-18

- added support for Bootstrap 4

## 1.0.1 - 2020-07-18

- added `hasErrorAndShow` method to components
- use `$slot` and added `$attributes` to `form-button`
- added `$attibutes` to `form-group` and `form-label`
- fixed translation bug

## 1.0.0 - 2020-07-17

- initial release
