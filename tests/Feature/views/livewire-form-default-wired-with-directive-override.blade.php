<x-form wire:submit.prevent="submit">
    <x-form-input name="input" />

    @wire(false)
    <x-form-textarea name="textarea" />
    @endwire

    <x-form-select name="select" :options="['' => '', 'c' => 'c']" />

    @wire('defer')
    <x-form-select name="multi_select" multiple :options="['d' => 'd', 'e' => 'e', 'f' => 'f']" />
    @endwire

    <x-form-checkbox name="checkbox" wire:model.debounce.500ms="checkbox" />

    <x-form-group name="radio">
        <x-form-radio name="radio" />
    </x-form-group>

    <x-form-submit />
</x-form>