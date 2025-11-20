<div class="@if($type === 'hidden') d-none @endif mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}" :help="$help ?? null"/>

    <div class="input-wrapper">
    <div class="input-group">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset

            <input {!! $attributes->merge([
                'class' => 'form-control ' . ($hasError($name) ? ' is-invalid' : ''),
                'aria-describedby' => ($hasError($name) ? $name . '-feedback' : '') . (isset($help) && $help ? ' ' . $name . '-help' : ''),
                'aria-invalid' => $hasError($name) ? 'true' : 'false'
            ]) !!}
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
        
        @if($hasError($name))
            <div class="invalid-feedback" id="{{ $name }}-feedback" role="alert">
                <i class="fas fa-exclamation-circle me-1"></i>
                {{ $errors->first($name) }}
            </div>
        @elseif(isset($help) && $help)
            <div class="form-text" id="{{ $name }}-help">
                {{ $help }}
            </div>
        @endif
    </div>
</div>
