<div class=" form-group col-6">
    <label class="control-label" for="{{$nameStart}}">
        {{$labelStart}}
    </label>
    <div class="input-group m-t-10">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-fw ti-calendar"></i>
            </span>
        </div>
        <input class="form-control" id="{{$nameStart}}" name="{{$nameStart}}"
               placeholder="{{$labelStart}}"  autocomplete="off" value="{{$valueStart}}">
    </div>
</div>
<div class="form-group col-6">
    <label class="control-label" for="{{$nameEnd}}">
        {{$labelEnd}}
    </label>
    <div class="input-group m-t-10">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-fw ti-calendar"></i>
            </span>
        </div>
        <input class="form-control" id="{{$nameEnd}}" name="{{$nameEnd}}"
               placeholder="{{$labelEnd}}"  autocomplete="off" value="{{$valueEnd}}" >
    </div>
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
        jQuery(function () {
            $('#{{$nameStart}}').datetimepicker({
                format: 'Y-m-d',
                onShow: function (ct) {
                    this.setOptions({
                        maxDate: $('#{{$nameEnd}}').val() ? $('#{{$nameEnd}}').val() : false
                    })
                },
                timepicker: false
            });
            $('#{{$nameEnd}}').datetimepicker({
                format: 'Y-m-d',
                onShow: function (ct) {
                    this.setOptions({
                        minDate: $('#{{$nameStart}}').val() ? $('#{{$nameStart}}').val() : false
                    })
                },
                timepicker: false
            });
        });
    </script>
@endpush