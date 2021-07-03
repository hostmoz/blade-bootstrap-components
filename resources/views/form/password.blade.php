<div class="@if($type === 'hidden') d-none @else form-group @endif">
    <x-bootstrap::form.label :label="$label" :for="$name" />
    <div class="input-group"  id="show_hide_password">
        @isset($prepend)
            <div class="input-group-text">
                {!! $prepend !!}
            </div>
        @endisset
        <input type="password" {!! $attributes->merge(['class' => 'form-control border-end-0' . ($hasError($name) ? 'is-invalid' : '')]) !!}
            type="{{ $type }}"

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
                value="{{ $value }}"
            @endif
        />
            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
            @if($hasErrorAndShow($name))
                <x-bootstrap::form.errors :name="$name" />
            @endif
    </div>

    {!! $help ?? null !!}

</div>

@once
    @push('scripts')
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bx-hide");
                        $('#show_hide_password i').removeClass("bx-show");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bx-hide");
                        $('#show_hide_password i').addClass("bx-show");
                    }
                });
            });
        </script>
    @endpush
@endonce
