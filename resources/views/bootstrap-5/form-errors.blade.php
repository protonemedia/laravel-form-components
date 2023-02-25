@error($name, $bag)
    <div {!! $attributes->merge(['class' => 'invalid-feedback']) !!}>
        {{ $message }}
    </div>
@enderror
@foreach(collect($errors->get($name.'.*')) as $message)
    <x-form-errors name="{{ $name }}.*" :bag="$bag" />
@endforeach
