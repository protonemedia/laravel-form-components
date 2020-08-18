<form method="{{ $FormMethod }}" {!! $attributes !!}>

@unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
    @csrf
@endunless


@unless(in_array($method, ['GET', 'POST']))
    @method($method)
@endunless

    {!! $slot !!}
</form>
