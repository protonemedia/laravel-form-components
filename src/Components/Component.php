<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;

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
}
