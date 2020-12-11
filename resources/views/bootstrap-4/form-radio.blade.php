<div class="form-check">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        type="radio"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif

        value="{{ $value }}"

        @if($checked)
            checked="checked"
        @endif

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif
    />

   <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" class="form-check-label" />

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>