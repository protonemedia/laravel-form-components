<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class SelectTest extends TestCase
{
    /** @test */
    public function it_shows_the_slot_if_the_options_are_empty()
    {
        $this->registerTestRoute('select-slot');

        $this->visit('/select-slot')
            ->seeElement('option[value="a"]')
            ->seeElement('option[value="b"]')
            ->seeElement('option[value="c"]');
    }

    /** @test */
    public function it_can_render_a_placeholder()
    {
        $this->registerTestRoute('select-placeholder');

        $this->visit('/select-placeholder')
            ->seeElement('option[value=""][selected="selected"]')
            ->seeElement('option[value="a"]')
            ->seeElement('option[value="b"]');
    }
}
