<x-form>
    @bind($post)
        <x-form-input name="content" />
        <x-form-select name="comments" :options="$options" multiple many-relation />
        <x-form-submit />
    @endbind
</x-form>