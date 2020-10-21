<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Http\Request;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class MultipleSelectTest extends TestCase
{
    /** @test */
    public function it_posts_all_selected_options()
    {
        $this->registerTestRoute('multiple-select-keys', function (Request $request) {
            $request->validate([
                'select' => 'required|string',
            ]);
        });

        $this->visit('/multiple-select-keys?both=yes')
            ->seeElement('option[value="be"]:selected')
            ->seeElement('option[value="nl"]:selected')
            ->press('Submit')
            ->seeElement('option[value="be"]:selected')
            ->seeElement('option[value="nl"]:selected')
            ->seeText('The select must be a string.');
    }
}
