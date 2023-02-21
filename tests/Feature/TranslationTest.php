<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class TranslationTest extends TestCase
{
    /** @test */
    public function it_can_have_no_target_bound_to_the_form()
    {
        $this->registerTestRoute('translation');

        $this->visit('/translation')
            ->seeElement('input[name="input[nl]"][value=""]')
            ->seeElement('input[name="input[en]"][value=""]');
    }

    /** @test */
    public function it_can_bind_a_target_to_the_form()
    {
        $this->registerTestRoute('translation-with-bind');

        $this->visit('/translation-with-bind')
            ->seeElement('input[name="input[nl]"][value="hallo"]')
            ->seeElement('input[name="input[en]"][value="hello"]');
    }

    /** @test */
    public function it_can_override_the_bind_with_a_different_target()
    {
        $this->registerTestRoute('translation-with-bind');

        $this->visit('/translation-with-bind')
            ->seeElement('input[name="output[nl]"][value="vaarwel"]')
            ->seeElement('input[name="output[en]"][value="goodbye"]');
    }

    /** @test */
    public function it_shows_the_validation_errors_and_old_values_correctly()
    {
        $this->registerTestRoute('translation-with-bind', function (Request $request) {
            $request->validate([
                'input.*' => 'min:5',
            ]);
        });

        $this->visit('/translation-with-bind')
            ->type('hoi', 'input[nl]')
            ->type('hey', 'input[en]')
            ->press('Submit')
            ->seeElement('input[name="input[nl]"][value="hoi"]')
            ->seeElement('input[name="input[en]"][value="hey"]')
            ->seeText(static::isLaravel10() ? 'The input.nl field must be at least 5 characters' : 'The input.nl must be at least 5 characters')
            ->seeText(static::isLaravel10() ? 'The input.en field must be at least 5 characters' : 'The input.en must be at least 5 characters');
    }
}
