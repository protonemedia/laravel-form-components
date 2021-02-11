<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormRadio extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;

    public string $name;
    public string $label;
    public $value;
    public bool $checked = false;

    public function __construct(
        string $name,
        string $label = '',
        $value = 1,
        $bind = null,
        bool $default = null,
        bool $showErrors = false
    ) {
        $this->name       = $name;
        $this->label      = $label;
        $this->value      = $value;
        $this->showErrors = $showErrors;

        if (old($name)) {
            $this->checked = old($name) == $value;
        }

        if (!session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $name);

            if (!is_null($boundValue)) {
                $this->checked = $boundValue == $this->value;
            } elseif (!is_null($default)) {
                $this->checked = $default == $this->value;
            }
        }
    }

    /**
     * Generates an ID by the name and value attributes.
     *
     * @return string
     */
    protected function generateIdByName(): string
    {
        return "auto_id_" . $this->name . "_" . $this->value;
    }
}
