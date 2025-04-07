<button id="{{$name}}Button" {!! $attributes->merge([
    'class' => 'btn btn-danger',
    'type' => 'submit'
]) !!}>
    <i class='fas fa-trash'></i> {!! $label ?: __('Submit') !!}
</button>


@push('scripts')
    <form action="{{$action}}" id="{{$name}}Form" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <script>
        $('#{!! $name !!}Button').click(function(event) {
            event.preventDefault(); // Prevent immediate form submission
            if (confirm('{!! $confirm !!}')) {
                $('#{!! $name !!}Form').submit(); // Submit the form
            }

        });
    </script>
@endpush