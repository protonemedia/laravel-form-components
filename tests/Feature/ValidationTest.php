<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class ValidationTest extends TestCase
{
    /** @test */
    public function it_shows_the_validation_errors_for_each_component()
    {
        $this->registerTestRoute('validation-errors', function (Request $request) {
            $request->validate([
                'input'    => 'required',
                'textarea' => 'required',
                'select'   => 'required',
                'checkbox' => 'required',
                'radio'    => 'required',
            ]);
        });

        $this->visit('/validation-errors')
            ->press('Submit')
            ->seeInElement('p', 'The input field is required')
            ->seeInElement('p', 'The textarea field is required')
            ->seeInElement('p', 'The select field is required')
            ->seeInElement('p', 'The checkbox field is required')
            ->seeInElement('p', 'The radio field is required');
    }

    /** @test */
    public function it_has_an_option_to_hide_the_validation_errors()
    {
        $this->registerTestRoute('hidden-validation-errors', function (Request $request) {
            $request->validate([
                'input'    => 'required',
                'textarea' => 'required',
                'select'   => 'required',
                'checkbox' => 'required',
                'radio'    => 'required',
            ]);
        });

        $this->visit('/hidden-validation-errors')
            ->press('Submit')
            ->dontSeeElement('p')
            ->dontSeeElement('p')
            ->dontSeeElement('p')
            ->dontSeeElement('p')
            ->dontSeeElement('p');
    }

    /** @test */
    public function it_uses_the_old_values()
    {
        $this->registerTestRoute('validation-errors', function (Request $request) {
            $request->validate([
                'input'    => 'required|in:d',
                'textarea' => 'required|in:d',
                'select'   => 'required|in:d',
                'checkbox' => 'required',
                'radio'    => 'required',
            ]);
        });

        $this->visit('/validation-errors')
            ->type('a', 'input')
            ->type('b', 'textarea')
            ->select('c', 'select')
            ->check('checkbox')
            ->check('radio')
            ->press('Submit')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'b')
            ->seeElement('option[value="c"]:selected')
            ->seeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }
}
