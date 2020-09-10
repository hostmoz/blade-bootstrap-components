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
    <link rel="stylesheet" href="{{global_asset('css/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{global_asset('css/datepicker.css')}}">
@endpush
@push('scripts')
    <script src="{{global_asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{global_asset('js/jquery.datetimepicker.js')}}" type="text/javascript"></script>
@endpush
@endonce

@push('scripts')
    <script>
        $('#datetimepicker').datetimepicker({
            lang: 'en'
        });
    </script>
@endpush