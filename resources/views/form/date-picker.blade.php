<div class="form-group">
    <label for="datetimepicker">
        {{$label}}
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-fw ti-calendar"></i>
            </span>
        </div>
        <input type="text" class="form-control float-right" id="{{$name}}" name="{{$name}}" value="{{$value}}" autocomplete="off"/>
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
