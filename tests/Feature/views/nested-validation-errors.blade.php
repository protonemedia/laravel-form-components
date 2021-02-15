<x-form>
    <x-form-input name="input[nested]" />
    <x-form-textarea name="textarea[nested]" />
    <x-form-select name="select[nested]" :options="['c' => 'c', 'f' => 'f']" />
    <x-form-checkbox name="checkbox[nested]" />

    <x-form-group name="radio[nested]">
        <x-form-radio name="radio[nested]" />
    </x-form-group>

    <x-form-submit />
</x-form>