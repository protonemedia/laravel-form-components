<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;
use ProtoneMedia\LaravelFormComponents\FormDataBinder;

abstract class Component extends BaseComponent
{
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
}
