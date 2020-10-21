<x-form>
    <x-form-select multiple name="select[]" :default="(old() ? null : ['be', 'nl'])"
        :options="['be' => 'Belgium', 'nl' => 'The Netherlands']" />

    <x-form-input name="another_field" />
    <x-form-submit />
</x-form>
