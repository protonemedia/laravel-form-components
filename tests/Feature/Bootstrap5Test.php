<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class Bootstrap5Test extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        if (config('form-components.framework') !== 'bootstrap-5') {
            $this->markTestSkipped('Other framework configured');
        }
    }

    /** @test */
    public function it_can_group_elements()
    {
        $this->registerTestRoute('bootstrap-input-group');

        $this->visit('/bootstrap-input-group')
            ->within('.input-group', function() {
                return $this->seeElementCount('.form-control', 2)
                    ->seeElementCount('.input-group-text', 1)
                    ->seeInElement('.input-group-text', '@');
            });
    }

    /** @test */
    public function it_can_float_labels()
    {
        $this->registerTestRoute('bootstrap-floating-label');

        $this->visit('/bootstrap-floating-label')
            ->seeElementCount('label', 2)
            ->seeInElement('label', 'Your Name')
            ->seeElement('#name1', ['placeholder' => ' '])
            ->seeElement('#name2', ['placeholder' => 'John Doe']);
    }
}
