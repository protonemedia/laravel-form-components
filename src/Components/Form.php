<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\ViewErrorBag;

class Form extends Component
{
    /**
     * Request method.
     */
    public string $method;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method = 'POST')
    {
        $this->method = strtoupper($method);
    }

    /**
     * Returns a boolean wether the error bag is not empty.
     *
     * @param string $bag
     * @return boolean
     */
    public function hasError($bag = 'default'): bool
    {
        $errors = request()->session()->get('errors') ?: new ViewErrorBag;

        return $errors->getBag($bag)->isNotEmpty();
    }
}
