@php
    $target = new \ProtoneMedia\LaravelFormComponents\Tests\Feature\TranslatableModel;
    $target->setTranslations('input', ['nl' => 'hallo', 'en' => 'hello']);
@endphp

<x-form>
    @bind($target)
        <x-form-input name="input" language="nl" />
        <x-form-input name="input" language="en" />

        <x-form-submit />
    @endbind
</x-form>