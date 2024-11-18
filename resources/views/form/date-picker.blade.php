<div class="mb-3">
    <x-bootstrap::form.label :label="$label" :for="$name" class="{{$required?'required':''}}"/>
    <div class="input-group date">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset
        <input type="text"
               {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? ' is-invalid' : '')]) !!} id="{{$name}}"
               @if($isWired())
                   wire:model="{{ $name }}"
               @else
                   name="{{ $name }}"
               value="{{$value}}"
               @endif
               @if($required)
                   required="required"
                @endif>
        <div class="input-group-text">
            <span class="bi bi-calendar-date"></span>
        </div>
            <x-bootstrap::form.errors :name="$name"/>
    </div>
</div>


@once
    @push('styles')
        <link rel="stylesheet" type="text/css"
              href="{{asset('vendor/bootstrap-components/css/bootstrap-datepicker.standalone.min.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    @endpush
    @push('scripts')
        <script src="{{asset('vendor/bootstrap-components/js/bootstrap-datepicker.min.js')}}"
                type="text/javascript"></script>
    @endpush
@endonce
@push('scripts')
    <script>
        $("[name='{{$name}}']").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        }).on('changeDate', function (e) {
            let event = {
                field: $(this).attr('name'),
                value: $(this).val()
            }

            Livewire.dispatch('dateFieldUpdated',event);
        });
    </script>
@endpush
