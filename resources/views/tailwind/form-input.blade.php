<div class="@if($type === 'hidden') hidden @else mt-4 @endif">
    <label class="block">
        <x-form-label :label="$label" />

        <input {!! $attributes->merge([
            'class' => 'form-input block w-full ' . ($label ? 'mt-1' : '')
        ]) !!}
            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @else
                name="{{ $name }}"
                value="{{ $value }}"
            @endif

            type="{{ $type }}" />
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>