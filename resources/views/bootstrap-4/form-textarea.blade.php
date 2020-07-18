<div class="form-group">
    <x-form-label :label="$label" :for="$name" />

    <textarea {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        name="{{ $name }}">{!! $value !!}</textarea>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>