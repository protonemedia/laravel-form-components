<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Contracts\Support\Arrayable;
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
    public bool $floating;

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
        bool $showErrors = true,
        bool $manyRelation = false,
        bool $floating = false
    ) {
        $this->name         = $name;
        $this->label        = $label;
        $this->options      = $options;
        $this->manyRelation = $manyRelation;

        if ($this->isNotWired()) {
            $inputName = Str::before($name, '[]');

            $default = $this->getBoundValue($bind, $inputName) ?: $default;

            $this->selectedKey = old(static::convertBracketsToDots($inputName), $default);

            if ($this->selectedKey instanceof Arrayable) {
                $this->selectedKey = $this->selectedKey->toArray();
            }
        }

        $this->multiple   = $multiple;
        $this->showErrors = $showErrors;
        $this->floating   = $floating && !$multiple;
    }

    public function isSelected($key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        return in_array($key, Arr::wrap($this->selectedKey));
    }
}
