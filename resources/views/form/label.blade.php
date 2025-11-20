@if($label)
    <label {{ $attributes->merge(['class' => 'form-label']) }}>
        {{ $label }}
        @if(isset($help) && $help)
            <i class="fas fa-question-circle text-muted ms-1" 
               data-bs-toggle="tooltip" 
               data-bs-placement="top" 
               title="{{ $help }}"
               aria-label="{{ __('Help') }}: {{ $help }}"></i>
        @endif
    </label>
@endif
