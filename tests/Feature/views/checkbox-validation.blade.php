<x-form>
    <x-form-group>
        <x-form-checkbox name="checkbox[]" value="a" />
    </x-form-group>

    <x-form-group>
        <x-form-checkbox name="checkbox[]" value="b" :default="old() ? false : true" />
    </x-form-group>

    <x-form-submit />
</x-form>
