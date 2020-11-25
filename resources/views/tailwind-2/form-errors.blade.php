@error($name, $bag)
    <p {!! $attributes->merge(['class' => 'text-red-500 text-xs italic']) !!}>
        {{ $message }}
    </p>
@enderror