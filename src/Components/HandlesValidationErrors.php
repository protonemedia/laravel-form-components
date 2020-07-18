<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    public $showErrors = true;

    public function hasErrorAndShow(string $name, string $bag = 'default'): bool
    {
        if (!$this->showErrors) {
            return false;
        }

        $errors = request()->session()->get('errors') ?: new ViewErrorBag;

        $name = str_replace(['[', ']'], ['.', ''], $name);

        return $errors->getBag($bag)->has($name);
    }
}
