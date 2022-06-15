<div class="@if($type === 'hidden') d-none @endif mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name"/>

    <div class="input-group">
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
               placeholder="{{$placeholder??$label}}"
        />
        @isset($append)
            <div class="input-group-text">
                {!! $append !!}
            </div>
        @endisset
        @if($hasErrorAndShow($name))
            <x-bootstrap::form.errors :name="$name"/>
        @endif
    </div>

    {!! $help ?? null !!}
</div>
