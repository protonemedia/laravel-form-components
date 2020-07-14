@php
    $targetA = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'checkbox' => true,
        'radio' => true
    ];

    $targetB = [
        'input' => 'd',
        'textarea' => 'e',
        'select' => 'f',
        'checkbox' => false,
        'radio' => false
    ];
@endphp

<x-form>
    @bind($targetA)
        <x-form-input name="input" />

        @bind($targetB)
            <x-form-textarea name="textarea" />
            <x-form-select name="select" :options="['c' => 'c', 'f' => 'f']" />
            <x-form-checkbox name="checkbox" />
        @endbind

        <x-form-group name="radio">
            <x-form-radio name="radio" />
        </x-form-group>

        <x-form-submit />
    @endbind
</x-form>