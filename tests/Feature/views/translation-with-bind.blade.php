@php
    $targetA = new \ProtoneMedia\LaravelFormComponents\Tests\Feature\TranslatableModel;
    $targetA->setTranslations('input', ['nl' => 'hallo', 'en' => 'hello']);

    $targetB = new \ProtoneMedia\LaravelFormComponents\Tests\Feature\TranslatableModel;
    $targetB->setTranslations('output', ['nl' => 'vaarwel', 'en' => 'goodbye']);
@endphp

<x-form>
    @bind($targetA)
        <x-form-input name="input" language="nl" />
        <x-form-input name="output" language="nl" :bind="$targetB" />

        <x-form-input name="input" language="en" />
        <x-form-input name="output" language="en" :bind="$targetB" />

        <x-form-submit />
    @endbind
</x-form>