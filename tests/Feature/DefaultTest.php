<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class DefaultTest extends TestCase
{
    /** @test */
    public function it_can_set_a_default_value()
    {
        $this->registerTestRoute('default-values');

        $this->visit('/default-values')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'b')
            ->seeElement('option[value="c"]:selected')
            ->seeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }
}
