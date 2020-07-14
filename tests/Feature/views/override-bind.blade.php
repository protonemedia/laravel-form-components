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
        <x-form-input :bind="$targetB" name="input" />
        <x-form-textarea :bind="$targetB" name="textarea" />
        <x-form-select :bind="$targetB" name="select" :options="['c' => 'c', 'f' => 'f']" />
        <x-form-checkbox :bind="$targetB" name="checkbox" />

        <x-form-group name="radio">
            <x-form-radio :bind="$targetB" name="radio" />
        </x-form-group>

        <x-form-submit />
    @endbind
</x-form>