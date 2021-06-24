<div class="form-group">
    <x-bootstrap::form.label :label="$label" :for="$name" />
    <div class="input-group">
        @isset($prepend)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            </div>
        @endisset
        <input type="text" class="form-control float-right" id="{{$name}}" name="{{$name}}" value="{{$value}}" autocomplete="off"/>
            @isset($append)
                <div class="input-group-append">
                    <div class="input-group-text">
                        {!! $append !!}
                    </div>
                </div>
            @endisset
    </div>
    <!-- /.input group -->
</div>

@once
@push('styles')
    <link rel="stylesheet" href="{{asset('css/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.datetimepicker.js')}}" type="text/javascript"></script>
@endpush
@endonce

@push('scripts')
    <script>
        $("[name='{{$name}}']").datetimepicker({
            lang: 'en',
            format:'Y-m-d',
            timepicker:false,
        });
    </script>
@endpush
