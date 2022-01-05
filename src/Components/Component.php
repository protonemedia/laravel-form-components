<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;
use ProtoneMedia\LaravelFormComponents\FormDataBinder;

abstract class Component extends BaseComponent
{
    /**
     * ID for this component.
     *
     * @var string
     */
    private $id;

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $alias = Str::kebab(class_basename($this));

        $config = config("form-components.components.{$alias}");

        $framework = config("form-components.framework");

        return str_replace('{framework}', $framework, $config['view']);
    }

    /**
     * Returns a boolean wether the form is wired to a Livewire component.
     *
     * @return boolean
     */
    public function isWired(): bool
    {
        if ($this->attributes && count($this->attributes->whereStartsWith('wire:model')->getIterator())) {
            return false;
        }

        return app(FormDataBinder::class)->isWired();
    }

    /**
     * The inversion of 'isWired()'.
     *
     * @return boolean
     */
    public function isNotWired(): bool
    {
        return !$this->isWired();
    }

    /**
     * Returns the optional wire modifier.
     *
     * @return string
     */
    public function wireModifier(): ?string
    {
        $modifier = app(FormDataBinder::class)->getWireModifier();

        return $modifier ? ".{$modifier}" : null;
    }

    /**
     * Generates an ID, once, for this component.
     *
     * @return string
     */
    public function id(): string
    {
        if ($this->id) {
            return $this->id;
        }

        if ($this->name) {
            return $this->id = $this->generateIdByName();
        }

        return $this->id = Str::random(4);
    }

    /**
     * Generates an ID by the name attribute.
     *
     * @return string
     */
    protected function generateIdByName(): string
    {
        return "auto_id_" . $this->name;
    }

    /**
     * Converts a bracket-notation to a dotted-notation
     *
     * @param string $name
     * @return string
     */
    protected static function convertBracketsToDots($name): string
    {
        return str_replace(['[', ']'], ['.', ''], $name);
    }
}
