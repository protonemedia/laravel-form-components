<?php

use ProtoneMedia\LaravelFormComponents\Components;

return [
    'prefix' => '',

    /** tailwind | tailwind-2 | bootstrap-4 */
    'framework' => 'tailwind',

    'components' => [
        'form' => [
            'view'  => 'form-components::{framework}.form',
            'class' => Components\Form::class,
        ],

        'form-checkbox' => [
            'view'  => 'form-components::{framework}.form-checkbox',
            'class' => Components\FormCheckbox::class,
        ],

        'form-errors' => [
            'view'  => 'form-components::{framework}.form-errors',
            'class' => Components\FormErrors::class,
        ],

        'form-group' => [
            'view'  => 'form-components::{framework}.form-group',
            'class' => Components\FormGroup::class,
        ],

        'form-input' => [
            'view'  => 'form-components::{framework}.form-input',
            'class' => Components\FormInput::class,
        ],

        'form-label' => [
            'view'  => 'form-components::{framework}.form-label',
            'class' => Components\FormLabel::class,
        ],

        'form-radio' => [
            'view'  => 'form-components::{framework}.form-radio',
            'class' => Components\FormRadio::class,
        ],

        'form-select' => [
            'view'  => 'form-components::{framework}.form-select',
            'class' => Components\FormSelect::class,
        ],

        'form-submit' => [
            'view'  => 'form-components::{framework}.form-submit',
            'class' => Components\FormSubmit::class,
        ],

        'form-textarea' => [
            'view'  => 'form-components::{framework}.form-textarea',
            'class' => Components\FormTextarea::class,
        ],
    ],
];
