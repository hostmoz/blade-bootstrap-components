<div class="@if($type === 'hidden') d-none @endif mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}"/>

    <div class="input-group">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset

        <input {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? ' is-invalid' : '')]) !!}
               type="{{ $type }}"
               id="{{ $name }}"

               @if($isWired())
                   wire:model="{{ $name }}"
               @else
                   name="{{ $name }}"
               value="{{$value}}"
               @endif
               placeholder="{{$placeholder??$label}}"
               @if($required)
                   required="required"
                @endif
        />


        @isset($append)
            <div class="input-group-text">
                {!! $append !!}
            </div>
        @endisset
    </div>
    <x-bootstrap::form.errors :name="$name"/>
    {!! $help ?? null !!}
</div>
