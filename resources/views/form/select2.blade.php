
<div>
    <x-bootstrap::form.label :label="$label" :for="$name" />
    <select
        @if($isWired())
        wire:model="{{ $name }}"
        @else
        name="{{ $name }}"
        @endif

        @if($multiple)
        multiple
        @endif

        {!! $attributes->merge(['class' => 'form-select ' . ($hasError($name) ? 'is-invalid' : '')]) !!} id="{{$name}}">
        <option></option>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>
    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name" />
    @endif

    {!! $help ?? null !!}
</div>
@once
    @push('styles')
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    @endpush
    @push('scripts')
        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#{!! $name !!}').select2({
                theme: 'bootstrap4',
                placeholder:'{!! $placeholder??$label !!}',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),
                minimumInputLength: 3,
                ajax: {
                    url: '{!! $url !!}',
                    dataType: 'json',
                    params: { // extra parameters that will be passed to ajax
                        contentType: 'application/json'
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            }),
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                },

            });
            $('#select2').on('change', function (e) {
                var item = $('#select2').select2("val");
            });
        });
    </script>
@endpush
@if($selectedKey)
    @push('scripts')
        <script>
            $(document).ready(function () {
                var selectedKey  = {!! $selectedKey !!};



                // make a request for the selected data object
                $.ajax({
                    type: 'GET',
                    url: '{!! $url !!}',
                    data: {
                        key:selectedKey
                    },
                    dataType: 'json'
                }).then(function (data) {
                    var option = new Option(data.name, selectedKey, true, true);
                    $("#{{$id}}").append(option).trigger('change');
                    // Here we should have the full data object
                    option.text = data.name;
                    option.value = data.id;

                    // create a new option and update Select2


                    // notify JavaScript components of possible changes
                    $("#{{$id}}").trigger('change').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });
            });
        </script>
    @endpush
@endif
