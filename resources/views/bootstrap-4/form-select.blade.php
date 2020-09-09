<div class="form-group">
    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />

    <select
        @if($isWired())
            wire:model="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif

        @if($multiple)
            multiple
        @endif

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>