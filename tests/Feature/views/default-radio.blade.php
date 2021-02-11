@php
$target = ['radio' => 'a'];
@endphp

<x-form>
    <x-form-group>
        <x-form-radio name="radio" value="1" default />
    </x-form-group>

    <x-form-group>
        <x-form-radio name="radio" value="0" />
    </x-form-group>

    <x-form-submit />
</x-form>
