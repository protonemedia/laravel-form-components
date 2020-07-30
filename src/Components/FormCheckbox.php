<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormCheckbox extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;

    public string $name;
    public string $label;
    public $value;
    public bool $checked = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        $value = 1,
        $bind = null,
        bool $default = false,
        bool $showErrors = true
    ) {
        $this->name       = $name;
        $this->label      = $label;
        $this->value      = $value;
        $this->showErrors = $showErrors;

        if (old($name)) {
            $this->checked = true;
        }

        if (!session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $name);

            $this->checked = is_null($boundValue) ? $default : $boundValue;
        }
    }
}
