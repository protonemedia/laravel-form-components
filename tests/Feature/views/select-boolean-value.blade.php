<x-form>
    @bind(['select' => '0'])
        <x-form-select name="select" :options="['1' => 'Yes', '0' => 'No']" />
    @endbind

    <x-form-submit />
</x-form>
