<div class="form-group">
    <x-form-label :label="$label" :for="$name" />

    <input {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $value }}"
    />

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>