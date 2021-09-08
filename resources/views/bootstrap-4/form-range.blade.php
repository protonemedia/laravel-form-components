<div class="form-group">
    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />

    <input
        {!! $attributes->merge(['class' => 'form-control-range' . ($hasError($name) ? ' is-invalid' : '')]) !!}

        type="range"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @else
            value="{{ $value }}"
        @endif

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif
    />

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
