<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ProtoneMedia\LaravelFormComponents\FormDataBinder;

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
}
