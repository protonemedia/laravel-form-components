@error($name, $bag)
    <p {!! $attributes->merge(['class' => 'text-red-500 text-xs italic']) !!}>
        {{ $message }}
    </p>
@enderror
@foreach(collect($errors->get($name.'.*')) as $message)
    <x-form-errors name="{{ $name }}.*" :bag="$bag" />
@endforeach
