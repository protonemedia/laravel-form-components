<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class Bootstrap4Test extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        if (config('form-components.framework') !== 'bootstrap-4') {
            $this->markTestSkipped('Other framework configured');
        }
    }

    /** @test */
    public function it_can_append_to_an_input()
    {
        $this->registerTestRoute('bootstrap-append');

        $this->visit('/bootstrap-append')
            ->seeInElement('.input-group-text', '.protone.media');
    }

    /** @test */
    public function it_can_prepend_to_an_input()
    {
        $this->registerTestRoute('bootstrap-prepend');

        $this->visit('/bootstrap-prepend')
            ->seeInElement('.input-group-text', 'info@');
    }
}
