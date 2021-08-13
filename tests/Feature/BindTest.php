<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class BindTest extends TestCase
{
    /** @test */
    public function it_can_bind_a_target_to_the_form()
    {
        $this->registerTestRoute('bind-target');

        $this->visit('/bind-target')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'b')
            ->seeElement('option[value="c"]:selected')
            ->seeElement('select[multiple]')
            ->seeElement('option[value="d"]:selected')
            ->seeElement('option[value="e"]:selected')
            ->seeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }

    /** @test */
    public function it_overrides_the_bound_target_with_the_old_request_data()
    {
        $this->registerTestRoute('bound-with-validation-errors', function (Request $request) {
            $request->validate([
                'input'    => 'required',
                'textarea' => 'required',
                'select'   => 'required',
                'checkbox' => 'required',
                'radio'    => 'required',
            ]);
        });

        $this->visit('/bound-with-validation-errors')
            ->type('d', 'input')
            ->type('e', 'textarea')
            ->select('f', 'select')
            ->uncheck('checkbox')
            ->check('radio')
            ->press('Submit')
            ->seeElement('input[name="input"][value="d"]')
            ->seeInElement('textarea[name="textarea"]', 'e')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }

    /** @test */
    public function it_handles_old_nested_data()
    {
        $this->registerTestRoute('nested-validation-errors', function (Request $request) {
            $request->validate([
                'input.nested'    => 'required',
                'textarea.nested' => 'required',
                'select.nested'   => 'required',
                'checkbox.nested' => 'required',
                'radio.nested'    => 'required',
            ]);
        });

        $this->visit('/nested-validation-errors')
            ->type('d', 'input[nested]')
            ->type('e', 'textarea[nested]')
            ->select('f', 'select[nested]')
            ->uncheck('checkbox[nested]')
            ->check('radio[nested]')
            ->press('Submit')
            ->seeElement('input[name="input[nested]"][value="d"]')
            ->seeInElement('textarea[name="textarea[nested]"]', 'e')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox[nested]"]')
            ->dontSeeElement('input[name="checkbox[nested]"]:checked')
            ->seeElement('input[name="radio[nested]"]:checked');
    }

    /** @test */
    public function it_overrides_the_default_value()
    {
        $this->registerTestRoute('default-values-with-bound-target');

        $this->visit('/default-values-with-bound-target')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'b')
            ->seeElement('option[value="c"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]')
            ->dontSeeElement('input[name="radio"]:checked');
    }

    /** @test */
    public function it_overrides_the_default_value_when_nested()
    {
        $this->registerTestRoute('default-values-with-nested-bound-target');

        $this->visit('/default-values-with-nested-bound-target')
            ->seeElement('input[name="nested[input]"][value="a"]')
            ->seeInElement('textarea[name="nested[textarea]"]', 'b')
            ->seeElement('select[name="nested[select]"] > option[value="c"]:selected')
            ->seeElement('input[name="nested[checkbox]"]')
            ->dontSeeElement('input[name="nested[checkbox]"]:checked')
            ->seeElement('input[name="nested[radio]"]')
            ->dontSeeElement('input[name="nested[radio]"]:checked');
    }

    /** @test */
    public function it_can_bind_two_targets_to_the_form()
    {
        $this->registerTestRoute('bind-two-targets');

        $this->visit('/bind-two-targets')
            ->seeElement('input[name="input"][value="a"]')
            ->seeInElement('textarea[name="textarea"]', 'e')
            ->dontSeeElement('option[value="c"]:selected')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]:checked');
    }

    /** @test */
    public function it_can_override_the_global_bind_with_a_bind_per_element()
    {
        $this->registerTestRoute('override-bind');

        $this->visit('/override-bind')
            ->seeElement('input[name="input"][value="d"]')
            ->seeInElement('textarea[name="textarea"]', 'e')
            ->seeElement('option[value="f"]:selected')
            ->seeElement('input[name="checkbox"]')
            ->dontSeeElement('input[name="checkbox"]:checked')
            ->seeElement('input[name="radio"]')
            ->dontSeeElement('input[name="radio"]:checked');
    }

    /** @test */
    public function it_can_disable_a_global_bind_per_element()
    {
        $this->registerTestRoute('undo-bind');

        $this->visit('/undo-bind')
            ->seeElement('input[name="input"][value="a"]')
            ->dontSeeInElement('textarea[name="textarea"]', 'b');
    }
}
