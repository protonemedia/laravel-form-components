<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

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
}
