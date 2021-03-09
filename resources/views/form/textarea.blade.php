<div class="form-group">
    <x-bootstrap::form.label :label="$label" :for="$name" />

    <textarea
        @if($isWired())
            wire:model="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif

        {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
    >@unless($isWired()){!! $value !!}@endunless</textarea>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name" />
    @endif
</div>
