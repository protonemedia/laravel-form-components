<?php

namespace ProtoneMedia\LaravelFormComponents;

use Illuminate\Support\Arr;

class FormDataBinder
{
    /**
     * Tree of bound targets.
     */
    private array $bindings = [];

    /**
     * Wired to a Livewire component.
     */
    private bool $wire = false;

    /**
     * Bind a target to the current instance
     *
     * @param mixed $target
     * @return void
     */
    public function bind($target): void
    {
        $this->bindings[] = $target;
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    public function get()
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding.
     *
     * @return void
     */
    public function pop(): void
    {
        array_pop($this->bindings);
    }

    public function isWired(): bool
    {
        return $this->wire;
    }

    public function wire(): void
    {
        $this->wire = true;
    }

    public function endwire(): void
    {
        $this->wire = false;
    }
}
