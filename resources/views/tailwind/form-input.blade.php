<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <input {!! $attributes->merge([
            'class' => 'form-input block w-full ' . ($label ? 'mt-1' : '')
        ]) !!}
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ $value }}"
        />
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>