<div class="@if($type === 'hidden') d-none @endif mb-3" x-data='{
        {{$name}}Selected(e) {
            let value = e.target.value
            let id = document.body.querySelector("datalist [value=\""+value+"\"]").dataset.value
            let hidden = document.body.querySelector("input[name={{$name}}Hidden]")
            hidden.value = id
            $wire.updateName(id)

            // todo: Do something interesting with this
            console.log(id);
        }
    }'>
    <x-bootstrap::form.label :label="$label" :for="$name"/>
    <div class="input-group">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset

        <input {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
               type="{{ $type }}"

               list="{{$name}}DatalistOptions"
               wire:model="{{ $name }}"
               name="{{ $name }}"
               value="{{ $value }}"
               placeholder="{{$placeholder??$label}}"
               autocomplete="off"
               x-on:change.debounce="{{$name}}Selected($event)"
        />
            <input type="hidden" name="{{$name}}Hidden"  wire:model.live="{{$name}}Hidden" wire:key="{{$name}}">
        @isset($append)
            <div class="input-group-text">
                {!! $append !!}
            </div>
        @endisset
        @if($hasErrorAndShow($name))
            <x-bootstrap::form.errors :name="$name"/>
        @endif
    </div>

    <datalist id="{{$name}}DatalistOptions">
        @foreach($options as $key => $option)
            <option value="{{ $option }}" wire:key="{{$key}}" data-value="{{$key}}">
        @endforeach
    </datalist>


    {!! $help ?? null !!}
</div>
