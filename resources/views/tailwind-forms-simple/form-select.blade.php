<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <select
            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @endif

            name="{{ $name }}"

            @if($multiple)
                multiple
            @endif

            @if($placeholder)
                placeholder="{{ $placeholder }}"
            @endif

            {!! $attributes->merge([
                'class' => ($label ? 'mt-1 ' : '') . 'block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            ]) !!}>

            @if($placeholder)
                <option value="" disabled @if($nothingSelected()) selected="selected" @endif>
                    {{ $placeholder }}
                </option>
            @endif

            @forelse($options as $key => $option)
                <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @empty
                {!! $slot !!}
            @endforelse
        </select>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>