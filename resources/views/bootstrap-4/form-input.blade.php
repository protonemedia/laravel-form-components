<div class="form-group">
    <x-form-label :label="$label" :for="$name" />

    <input {!! $attributes->merge(['class' => 'form-control']) !!}
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $value }}"
    />

    @if($showErrors)
        <x-form-errors :name="$name" />
    @endif
</div>