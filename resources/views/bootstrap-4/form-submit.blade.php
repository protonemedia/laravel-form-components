<button {!! $attributes->merge([
    'class' => 'btn btn-primary',
    'type' => 'submit'
]) !!}>
    {!! trim($slot) ?: __('Submit') !!}
</button>