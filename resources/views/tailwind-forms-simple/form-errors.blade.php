@error($name, $bag)
    <p {!! $attributes->merge(['class' => 'mt-2 text-sm text-red-600']) !!}>
        {{ $message }}
    </p>
@enderror
@foreach(collect($errors->get($name.'.*')) as $message)
    <x-form-errors name="{{ $name }}.*" :bag="$bag" />
@endforeach
