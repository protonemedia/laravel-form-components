<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class RadioTest extends TestCase
{
    /** @test */
    public function it_check_the_right_element_as_default()
    {
        $this->registerTestRoute('default-radio');

        $this->visit('/default-radio')
            ->seeElement('input[value="a"]:checked')
            ->seeElement('input[value="b"]:not(:checked)');
    }

    /** @test */
    public function it_does_check_the_right_input_element_after_a_validation_error()
    {
        $this->registerTestRoute('radio-validation', function (Request $request) {
            $data = $request->validate([
                'radio' => 'required|in:a',
            ]);
        });

        $this->visit('/radio-validation')
            ->select('b', 'radio')
            ->press('Submit')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked');
    }
}
