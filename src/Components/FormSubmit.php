<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormSubmit extends Component
{
    public string $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label = '')
    {
        $this->label = $label ?: __('Submit');
    }
}
