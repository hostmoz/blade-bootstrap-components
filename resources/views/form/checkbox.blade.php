<div class="form-check" style="{{$divStyle}}">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        type="checkbox"
        value="{{ $value }}"

        @if($isWired())
            wire:model="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif


        @if($checked)
            checked="checked"
        @endif
    />

    <x-bootstrap::form.label :label="$label" :for="$name" class="form-check-label" />

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name" />
    @endif
</div>
