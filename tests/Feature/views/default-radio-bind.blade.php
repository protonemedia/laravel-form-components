@php
$target = ['radio' => 'a'];
@endphp

<x-form>
    @bind($target)
    <x-form-group>
        <x-form-radio name="radio" value="a" />
    </x-form-group>

    <x-form-group>
        <x-form-radio name="radio" value="b" />
    </x-form-group>
    @endbind

    <x-form-submit />
</x-form>
