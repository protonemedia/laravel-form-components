<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FormSelect extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;

    public string $name;
    public string $label;
    public $options;
    public $selectedKey;
    public bool $multiple;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        $options = [],
        $bind = null,
        $default = null,
        bool $multiple = false,
        bool $showErrors = true
    ) {
        $this->name    = $name;
        $this->label   = $label;
        $this->options = $options;

        if ($this->isNotWired()) {
            $inputName = Str::before($name, '[]');

            $default = $this->getBoundValue($bind, $inputName) ?: $default;

            $this->selectedKey = old($inputName, $default);
        }

        $this->multiple   = $multiple;
        $this->showErrors = $showErrors;
    }

    public function isSelected($key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        return in_array($key, Arr::wrap($this->selectedKey));
    }
}
