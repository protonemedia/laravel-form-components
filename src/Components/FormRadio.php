<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormRadio extends FormCheckbox
{
    public function __construct(
        string $name,
        string $label = '',
        $value = 1,
        $bind = null,
        bool $default = false,
        bool $showErrors = false
    ) {
        parent::__construct($name, $label, $value, $bind, $default, $showErrors);
    }
}
