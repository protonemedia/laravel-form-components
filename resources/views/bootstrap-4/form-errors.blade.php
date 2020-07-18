@error($name)
    <div {!! $attributes->merge(['class' => 'invalid-feedback']) !!}>
        {{ $message }}
    </div>
@enderror