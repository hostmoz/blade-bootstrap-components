<div class="mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required ?? false ? 'required' : ''}}" :help="$help ?? null"/>

    <div class="input-wrapper">
    <textarea
        @if($isWired())
            wire:model="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif

            {!! $attributes->merge([
                'class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : ''),
                'aria-describedby' => ($hasError($name) ? $name . '-feedback' : '') . (isset($help) && $help ? ' ' . $name . '-help' : ''),
                'aria-invalid' => $hasError($name) ? 'true' : 'false',
                'id' => $name
            ]) !!}
            @if($required ?? false)
                required="required"
            @endif
    >
        {!! $value !!}
    </textarea>

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
