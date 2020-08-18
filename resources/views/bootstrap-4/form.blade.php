<form method="{{ $FormMethod }}" {!! $attributes->merge([
    'class' => $hasError() ? 'needs-validation' : ''
]) !!}>
    <style>
        .inline-space > :not(template) {
            margin-right: 1.25rem;
        }
    </style>

@unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
    @csrf
@endunless

@unless(in_array($method, ['GET', 'POST']))
    @method($method)
@endunless

    {!! $slot !!}
</form>
