<x-form>
    <x-form-input name="input">
        @slot('help')
            <small class="form-text text-muted">
                Your username must be 8-20 characters long.
            </small>
        @endslot
    </x-form-input>
</x-form>