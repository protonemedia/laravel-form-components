<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    public $showErrors = true;

    /**
     * Returns a boolean wether the given attribute has an error
     * and the should be shown.
     *
     * @param string $name
     * @param string $bag
     * @return boolean
     */
    public function hasErrorAndShow(string $name, string $bag = 'default'): bool
    {
        return $this->showErrors
            ? $this->hasError($name, $bag)
            : false;
    }

    /**
     * Returns a boolean wether the given attribute has an error.
     *
     * @param string $name
     * @param string $bag
     * @return boolean
     */
    public function hasError(string $name, string $bag = 'default'): bool
    {
        $errors = View::shared('errors', fn () => request()->session()->get('errors', new ViewErrorBag));

        $name = str_replace(['[', ']'], ['.', ''], $name);

        return $errors->getBag($bag)->has($name);
    }
}
