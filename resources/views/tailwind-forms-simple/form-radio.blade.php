<div>
    <label class="inline-flex items-center">
        <input {!! $attributes->merge(['class' => 'rounded-full border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
            type="radio"

            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @endif

            name="{{ $name }}"
            value="{{ $value }}"

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