<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormGroup extends Component
{
    use HandlesValidationErrors;

    public string $name;
    public string $label;
    public bool $inline = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name = '', string $label = '', bool $inline = false, bool $showErrors = true)
    {
        $this->name       = $name;
        $this->label      = $label;
        $this->inline     = $inline;
        $this->showErrors = $name && $showErrors;
    }
}
