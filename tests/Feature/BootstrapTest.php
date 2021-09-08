<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class BootstrapTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        if (!in_array(config('form-components.framework'), ['bootstrap-4', 'bootstrap-5'])) {
            $this->markTestSkipped('Other framework configured');
        }
    }

    /** @test */
    public function it_can_add_help_text()
    {
        $this->registerTestRoute('bootstrap-help');

        $this->visit('/bootstrap-help')
            ->seeInElement('.form-text', 'Your username must be 8-20 characters long.');
    }

    /** @test */
    public function it_sets_the_id_on_the_label_or_generates_one()
    {
        $this->registerTestRoute('bootstrap-label-for');

        $page = $this->visit('/bootstrap-label-for')
            ->seeElement('textarea[id="text_b"]')
            ->seeElement('label[for="text_b"]');

        $inputId = $page->crawler()->filter('input[type="text"]')->attr('id');

        $this->assertStringStartsWith("auto_id_", $inputId);

        $page
            ->seeElement('input[id="' . $inputId . '"]')
            ->seeElement('label[for="' . $inputId . '"]');
    }
}
