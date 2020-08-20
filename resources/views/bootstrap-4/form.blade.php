<form method="{{ $spoofMethod ? 'POST' : $method }}" {!! $attributes->merge([
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

@if($spoofMethod)
    @method($method)
@endif

    {!! $slot !!}
</form>
