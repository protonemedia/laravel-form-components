@php
    $target = [
        'nested' => [
            'input' => 'a',
            'textarea' => 'b',
            'select' => 'c',
            'checkbox' => false,
            'radio' => false,
        ]
    ];
@endphp

<x-form>
    @bind($target)
        <x-form-input default="d" name="nested[input]" />
        <x-form-textarea default="e" name="nested[textarea]" />
        <x-form-select default="f" name="nested[select]" :options="['' => '', 'c' => 'c']" />
        <x-form-checkbox :default="true" name="nested[checkbox]" />

        <x-form-group name="radio">
            <x-form-radio :default="true" name="nested[radio]" />
        </x-form-group>

        <x-form-submit />
    @endbind
</x-form>
