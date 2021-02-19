<div class="form-group">
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

        id ="{{$id}}" {!! $attributes->merge(['class' => 'form-control '.  ($hasError($name) ? 'is-invalid' : '')]) !!}>
        <option value="">Digite...</option>
    </select>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-bootstrap::form.errors :name="$name" />
    @endif
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#{{$id}}").select2({
                theme: "bootstrap",
                minimumInputLength: 5,
                ajax: {
                    url: '{!! $url !!}',
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
                }
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
