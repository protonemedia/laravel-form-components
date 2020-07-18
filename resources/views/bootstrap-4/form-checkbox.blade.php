<div class="form-check">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"

        @if($checked)
            checked="checked"
        @endif
    />

    <x-form-label :label="$label" :for="$name" class="form-check-label" />

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>