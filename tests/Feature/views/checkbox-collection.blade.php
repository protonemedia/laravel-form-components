@php
$target = ['permissions' => collect(['read'])]
@endphp

<x-form>
    @bind($target)
    <x-form-group>
        <x-form-checkbox name="permissions[]" value="read" />
        <x-form-checkbox name="permissions[]" value="write" />
    </x-form-group>
    @endbind

    <x-form-submit />
</x-form>
