<div class="form-group">
    <div class="form-check">
        <input {!! $attributes->merge(['class' => 'form-check-input']) !!}
            type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"

            @if($checked)
                checked="checked"
            @endif
        />

        <x-form-label :label="$label" :for="$name" class="form-check-label" />

        @if($showErrors)
            <x-form-errors :name="$name" />
        @endif
    </div>
</div>