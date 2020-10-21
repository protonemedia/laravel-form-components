@php
$target = ['checkbox' => ['a']];
@endphp

<x-form>
    @bind($target)
    <x-form-group>
        <x-form-checkbox name="checkbox[]" value="a" />
    </x-form-group>

    <x-form-group>
        <x-form-checkbox name="checkbox[]" value="b" />
    </x-form-group>
    @endbind

    <x-form-submit />
</x-form>
