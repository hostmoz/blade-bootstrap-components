<div class="mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}"/>
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

                    {!! $attributes->merge(['class' => 'form-select ' . ($hasError($name) ? ' is-invalid' : '')]) !!}>
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
    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name"/>
    @endif

    {!! $help ?? null !!}
</div>
