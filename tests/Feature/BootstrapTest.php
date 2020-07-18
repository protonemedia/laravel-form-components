<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class BootstrapTest extends TestCase
{
    /** @test */
    public function it_can_append_to_an_input()
    {
        $this->registerTestRoute('bootstrap-append');

        config(['form-components.framework' => 'bootstrap-4']);

        $this->visit('/bootstrap-append')
            ->seeInElement('.input-group-text', '.protone.media');
    }

    /** @test */
    public function it_can_prepend_to_an_input()
    {
        $this->registerTestRoute('bootstrap-prepend');

        config(['form-components.framework' => 'bootstrap-4']);

        $this->visit('/bootstrap-prepend')
            ->seeInElement('.input-group-text', 'info@');
    }

    /** @test */
    public function it_can_add_help_text()
    {
        $this->registerTestRoute('bootstrap-help');

        config(['form-components.framework' => 'bootstrap-4']);

        $this->visit('/bootstrap-help')
            ->seeInElement('.form-text', 'Your username must be 8-20 characters long.');
    }
}
