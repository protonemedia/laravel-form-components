@php
$id = $name.Str::random()
@endphp
<div class="form-check">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        type="radio"
        id="{{ $id }}"

        @if($isWired())
            wire:model="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif

        value="{{ $value }}"

        @if($checked)
            checked="checked"
        @endif
    />

   <x-form-label :label="$label" :for="$id" class="form-check-label" />

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>