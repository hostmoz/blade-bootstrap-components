<div class=" mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}"/>
    <input id="{{ $name }}" type="hidden" name="{{ $name }}" value="{{$value}}">
    <trix-editor input="{{ $name }}"></trix-editor>
</div>
