<div class="bootstrap-admin-card-content summer_noted">
    <textarea id="summernote" name="editordata"></textarea>
</div>

@once
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{global_asset('css/summernote/summernote-bs4.min.css')}}">
@endpush
@push('scripts')
    <script src="{{global_asset('js/summernote.min.js')}}" type="text/javascript"></script>
@endpush
@endonce

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 100               // set focus to editable area after initializing summernote
            });
        });

    </script>
@endpush