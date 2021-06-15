<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormInputGroupText extends Component
{
    public string $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $text = '')
    {
        $this->text = $text;
    }
}
