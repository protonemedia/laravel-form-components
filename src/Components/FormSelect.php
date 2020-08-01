<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

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
            $default = $this->getBoundValue($bind, $name) ?: $default;

            $this->selectedKey = old($name, $default);
        }

        $this->multiple   = $multiple;
        $this->showErrors = $showErrors;
    }

    public function isSelected($key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        if ($this->selectedKey === $key) {
            return true;
        }

        if (is_array($this->selectedKey) && in_array($key, $this->selectedKey)) {
            return true;
        }

        return false;
    }
}
