<div class="mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}" :help="$help ?? null"/>
    <div class="input-wrapper">
        <div class="input-group">
            @isset($prepend)
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            @endisset

                <select
                        @if($isWired())
                            wire:model="{{ $name }}"
                        @else
                            name="{{ $name }}"
                        @endif

                        @if($multiple)
                            multiple
                        @endif
                        @if($required)
                            required="required"
                        @endif

                        {!! $attributes->merge([
                            'class' => 'form-select ' . ($hasError($name) ? ' is-invalid' : ''),
                            'aria-describedby' => ($hasError($name) ? $name . '-feedback' : '') . (isset($help) && $help ? ' ' . $name . '-help' : ''),
                            'aria-invalid' => $hasError($name) ? 'true' : 'false',
                            'id' => $name
                        ]) !!}>
                    @if($empty)
                        <option value=""></option>
                    @endif
                    @foreach($options as $key => $option)
                        <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                            {{ $option }}
                        </option>
                    @endforeach
                </select>


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
