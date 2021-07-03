<div class="form-group">
    <x-bootstrap::form.label :label="$label" :for="$name" />
    <select
        @if($isWired())
            wire:model="{{ $name }}"
        @else
            name="{{ $name }}"
        @endif

        @if($multiple)
            multiple
        @endif

        {!! $attributes->merge(['class' => 'form-select ' . ($hasError($name) ? 'is-invalid' : '')]) !!}>
        <option value=""></option>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name" />
    @endif
</div>
