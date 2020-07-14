<form method="{{ $method }}" {!! $attributes !!}>
    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    {!! $slot !!}
</form>