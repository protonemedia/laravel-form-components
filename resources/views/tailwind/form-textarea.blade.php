<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <textarea {!! $attributes->merge([
            'class' => 'form-textarea block w-full ' . ($label ? 'mt-1' : '')
        ]) !!}
            name="{{ $name }}">{!! $value !!}</textarea>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>