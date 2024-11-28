<div class=" mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}"/>
    <input id="{{ $name }}" type="hidden" name="{{ $name }}" value="{{$value}}" {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? ' is-invalid' : '')]) !!}>
    <trix-editor input="{{ $name }}" class="trix-content"></trix-editor>
</div>
@once
    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    @endpush

    @push('scripts')
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
        <script>
            document.addEventListener('trix-change', () => {
                const content = document.querySelector('#trix-editor').value;
                Livewire.dispatch('trix-editor-changed', content);
            });
        </script>
    @endpush
@endonce