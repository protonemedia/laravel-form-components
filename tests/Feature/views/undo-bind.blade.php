@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
    ];
@endphp

<x-form>
    @bind($target)
        <x-form-input name="input" />
        <x-form-textarea name="textarea" :bind="false" />
        <x-form-submit />
    @endbind
</x-form>