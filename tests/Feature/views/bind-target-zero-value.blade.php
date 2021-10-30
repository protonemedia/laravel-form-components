@php
    $target = [
        'input' => 0,
    ];
@endphp

<x-form>
    @bind($target)
        <x-form-input name="input" />
        <x-form-submit />
    @endbind
</x-form>