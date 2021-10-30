<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Support\Str;

class FormErrors extends Component
{
    public string $name;
    public string $bag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $bag = 'default')
    {
        $this->name = static::convertBracketsToDots(Str::before($name, '[]'));

        $this->bag = $bag;
    }
}
