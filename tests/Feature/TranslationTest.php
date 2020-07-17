<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class TranslationTest extends TestCase
{
    /** @test */
    public function it_can_bind_a_target_to_the_form()
    {
        $this->registerTestRoute('translation');

        $this->visit('/translation')
            ->seeElement('input[name="input[nl]"][value="hallo"]')
            ->seeElement('input[name="input[en]"][value="hello"]');
    }

    /** @test */
    public function it_shows_the_validation_errors_and_old_values_correctly()
    {
        $this->registerTestRoute('translation', function (Request $request) {
            $request->validate([
                'input.*' => 'min:5',
            ]);
        });

        $this->visit('/translation')
            ->type('hoi', 'input[nl]')
            ->type('hey', 'input[en]')
            ->press('Submit')
            ->seeElement('input[name="input[nl]"][value="hoi"]')
            ->seeElement('input[name="input[en]"][value="hey"]')
            ->seeInElement('p', 'The input.nl must be at least 5 characters')
            ->seeInElement('p', 'The input.en must be at least 5 characters');
    }
}
