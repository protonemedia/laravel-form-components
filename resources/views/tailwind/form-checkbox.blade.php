<div class="flex flex-col">
    <label class="flex items-center">
        <input {!! $attributes->merge(['class' => 'form-checkbox']) !!}
            type="checkbox"
            value="{{ $value }}"

            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            @if($checked)
                checked="checked"
            @endif
        />

        <span class="ml-2">{{ $label }}</span>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>