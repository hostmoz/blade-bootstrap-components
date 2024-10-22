<div class="@if($type === 'hidden') d-none @endif mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}"/>

    <div class="input-group">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset

        <input {!! $attributes->merge(['class' => 'form-control border-end-0' . ($hasError($name) ? 'is-invalid' : '')]) !!}
               type="{{ $type }}"

               @if($isWired())
                   wire:model="{{ $name }}"
               @else
                   name="{{ $name }}"
               id="{{ $name }}"
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
    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name"/>
    @endif
    {!! $help ?? null !!}
</div>
