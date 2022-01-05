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
    public string $placeholder;

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
        bool $floating = false,
        string $placeholder = ''
    ) {
        $this->name         = $name;
        $this->label        = $label;
        $this->options      = $options;
        $this->manyRelation = $manyRelation;
        $this->placeholder  = $placeholder;

        if ($this->isNotWired()) {
            $inputName = static::convertBracketsToDots(Str::before($name, '[]'));

            if (is_null($default)) {
                $default = $this->getBoundValue($bind, $inputName);
            }

            $this->selectedKey = old($inputName, $default);

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

    public function nothingSelected(): bool
    {
        if ($this->isWired()) {
            return false;
        }

        return is_array($this->selectedKey) ? empty($this->selectedKey) : is_null($this->selectedKey);
    }
}
