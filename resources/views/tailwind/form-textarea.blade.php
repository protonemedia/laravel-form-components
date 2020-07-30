<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <textarea
            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            {!! $attributes->merge(['class' => 'form-textarea block w-full ' . ($label ? 'mt-1' : '')]) !!}>
                @if(!$isWired()) {!! $value !!} @endif
            </textarea>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>