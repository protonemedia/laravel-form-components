<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

enum TestEnum: int
{
    case a = 1;
    case b = 2;
    case c = 3;

    public static function toOptions(): array
    {
        $formattedCases = [];

        foreach (self::cases() as $option) {
            $formattedCases[$option->value] = $option->name;
        }

        return $formattedCases;
    }
}

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

    /** @test */
    public function it_can_render_a_selected_option()
    {
        $this->registerTestRoute('select-selected');
        $this->session(['_old_input' => ['select' => 'a']]);

        $this->visit('/select-selected')
            ->seeElement('option[value="a"][selected="selected"]')
            ->seeElement('option[value="b"]');
    }

    /** @test */
    public function it_can_render_a_selected_enum_option()
    {
        $this->registerTestRoute('select-selected-enum');
        $this->session(['_old_input' => ['select' => TestEnum::a]]);

        $this->visit('/select-selected-enum')
            ->seeElement('option[value="1"][selected="selected"]')
            ->seeElement('option[value="2"]')
            ->seeElement('option[value="3"]');
    }
}
