@error($name, $bag)
    <div {!! $attributes->merge(['class' => 'invalid-feedback']) !!}>
        {{ $message }}
    </div>
@enderror