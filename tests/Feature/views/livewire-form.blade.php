<x-form wire:submit.prevent="submit">
    @wire
        <x-form-input name="input" />
        <x-form-textarea name="textarea" />
        <x-form-select name="select" :options="['' => '', 'c' => 'c']" />
        <x-form-select name="multi_select" multiple :options="['d' => 'd', 'e' => 'e', 'f' => 'f']" />

        <x-form-checkbox name="checkbox" />

        <x-form-group name="radio">
            <x-form-radio name="radio" />
        </x-form-group>

        <x-form-submit />
    @endwire
</x-form>