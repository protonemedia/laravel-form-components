<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class SelectBooleanValueTest extends TestCase
{
    /** @test */
    public function it_shows_the_select_field()
    {
        $this->registerTestRoute('select-boolean-value');

        $this->visit('/select-boolean-value')
            ->seeElement('option[value="1"]')
            ->seeElement('option[value="0"]');
    }

    /** @test */
    public function it_shows_the_false_value_selected()
    {
        $this->registerTestRoute('select-boolean-value');

        $this->visit('/select-boolean-value')
            ->seeElement('option[value="1"]')
            ->seeElement('option[value="0"][selected="selected"]');
    }
}
