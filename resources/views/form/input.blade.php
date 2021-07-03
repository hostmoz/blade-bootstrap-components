<div class="@if($type === 'hidden') d-none @endif">
    <x-bootstrap::form.label :label="$label" :for="$name" />

    <div {!! $attributes->merge(['class' => 'input-group ' . ($hasError($name) ? 'is-invalid' : '')]) !!}>
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset

        <input {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
            type="{{ $type }}"

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
                value="{{ $value }}"
            @endif
        />
            @if($hasErrorAndShow($name))
                <x-bootstrap::form.errors :name="$name" />
            @endif

        @isset($append)
                <div class="input-group-text">
                    {!! $append !!}
                </div>
        @endisset
    </div>

    {!! $help ?? null !!}


</div>
