<div class="flex">
    <label class="flex items-center">
        <input {!! $attributes->merge(['class' => 'form-checkbox']) !!}
            type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"

            @if($checked)
                checked="checked"
            @endif
        />

        <span class="ml-2">{{ $label }}</span>
    </label>

    @if($showErrors)
        <x-form-errors :name="$name" />
    @endif
</div>