<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FormCheckbox extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;

    public string $name;
    public string $label;
    public string $help;
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
        string $help = '',
        $value = 1,
        $bind = null,
        bool $default = false,
        bool $showErrors = true
    ) {
        $this->name       = $name;
        $this->label      = $label;
        $this->help      = $help;
        $this->value      = $value;
        $this->showErrors = $showErrors;

        $inputName = Str::before($name, '[]');

        if ($oldData = old($inputName)) {
            $this->checked = in_array($value, Arr::wrap($oldData));
        }

        if (!session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            if (is_array($boundValue)) {
                $this->checked = in_array($value, $boundValue);
                return;
            }

            $this->checked = is_null($boundValue) ? $default : $boundValue;
        }
    }
}
