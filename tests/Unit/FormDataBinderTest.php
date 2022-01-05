<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Unit;

use ProtoneMedia\LaravelFormComponents\FormDataBinder;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class FormDataBinderTest extends TestCase
{
    /** @test */
    public function it_can_bind_targets()
    {
        $binder = new FormDataBinder;
        $this->assertNull($binder->get());

        $binder->bind($array = ['foo' => 'bar']);
        $this->assertEquals($array, $binder->get());
    }

    /** @test */
    public function it_can_bind_multiple_targets()
    {
        $binder = new FormDataBinder;

        $binder->bind($targetA = ['foo' => 'bar']);
        $binder->bind($targetB = ['bar' => 'foo']);

        $this->assertEquals($targetB, $binder->get());
        $binder->pop();

        $this->assertEquals($targetA, $binder->get());
        $binder->pop();

        $this->assertNull($binder->get());
    }

    /** @test */
    public function it_can_be_wired_to_a_livewire_property_or_not()
    {
        $binder = new FormDataBinder;

        $this->assertFalse($binder->isWired());

        $binder->wire();
        $this->assertTrue($binder->isWired());

        $binder->endWire();
        $this->assertFalse($binder->isWired());
    }
}
