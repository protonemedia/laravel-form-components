@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
        'select' => 'c',
        'checkbox' => true,
        'radio' => false
    ];
@endphp

<x-form>
    @bind($target)
        <x-form-input name="input" />
        <x-form-textarea name="textarea" />
        <x-form-select name="select" :options="['c' => 'c', 'f' => 'f']" />
        <x-form-checkbox name="checkbox" />

        <x-form-group name="radio">
            <x-form-radio name="radio" />
        </x-form-group>

        <x-form-submit />
    @endbind
</x-form>