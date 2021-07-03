<div>
    <x-bootstrap::form.label :label="$label" :for="$name"/>
    <div class="input-group">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset
        <input type="text"
               {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!} id="{{$name}}"
               name="{{$name}}" value="{{$value}}"
               autocomplete="off"/>
        @isset($append)
            <div class="input-group-text">
                {!! $append !!}
            </div>
        @endisset
        @if($hasErrorAndShow($name))
            <x-bootstrap::form.errors :name="$name"/>
        @endif
    </div>
</div>

@once
    @push('styles')
        <link rel="stylesheet" href="{{asset('vendor/bootstrap-components/css/jquery.datetimepicker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap-components/css/datepicker.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('vendor/bootstrap-components/js/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/bootstrap-components/js/jquery.datetimepicker.js')}}"
                type="text/javascript"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        $("[name='{{$name}}']").datetimepicker({
            lang: 'en',
            format:'Y-m-d H:i:s',
        });
    </script>
@endpush
