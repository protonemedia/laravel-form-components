<x-form action="/checkbox-validation">
    <x-form-group>
        <x-form-checkbox name="checkbox[]" value="a" :default="request()->query('check') == 'a'" />
    </x-form-group>

    <x-form-group>
        <x-form-checkbox name="checkbox[]" value="b" :default="request()->query('check') == 'b'" />
    </x-form-group>

    <x-form-submit />
</x-form>
