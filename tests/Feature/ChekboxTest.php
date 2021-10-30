<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class ChekboxTest extends TestCase
{
    /** @test */
    public function it_check_the_right_element_as_default()
    {
        $this->registerTestRoute('default-checkbox');

        $this->visit('/default-checkbox')
            ->seeElement('input[value="a"]:checked')
            ->seeElement('input[value="b"]:not(:checked)');
    }

    /** @test */
    public function it_supports_bound_collections()
    {
        $this->registerTestRoute('checkbox-collection');

        $this->visit('/checkbox-collection')
            ->seeElement('input[value="read"]:checked')
            ->seeElement('input[value="write"]:not(:checked)');
    }

    /** @test */
    public function it_does_check_the_right_input_element_after_a_validation_error()
    {
        $this->registerTestRoute('checkbox-validation', function (Request $request) {
            $request->validate([
                'checkbox'   => 'required|array',
                'checkbox.*' => 'in:a',
            ]);
        });

        $this->visit('/checkbox-validation')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked')
            ->press('Submit')
            ->seeElement('input[value="a"]:not(:checked)')
            ->seeElement('input[value="b"]:checked');
    }
}
