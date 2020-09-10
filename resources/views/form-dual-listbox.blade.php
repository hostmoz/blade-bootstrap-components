<div class="form-group">
    <label for="{{$name}}" class="control-label">{{$label}}</label>
    <select multiple="multiple" size="10" name="{{$name}}[]"
            id="{{$name}}">
        @foreach($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>

@once
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{global_asset('vendors/duallistbox/bootstrap-duallistbox.min.css')}}">
@endpush

@push('scripts')
    <script src="{{global_asset('vendors/duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
@endpush
@endonce

@push('scripts')
    <script>
        $('#{{$name}}').bootstrapDualListbox();
    </script>
@endpush