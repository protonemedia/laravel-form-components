<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <select
            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            @if($multiple)
                multiple
            @endif

            {!! $attributes->merge([
                'class' => ($label ? 'mt-1' : '') . ' block w-full ' . ($multiple ? 'form-multiselect' : 'form-select')
            ]) !!}>
            @foreach($options as $key => $option)
                <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @endforeach
        </select>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>