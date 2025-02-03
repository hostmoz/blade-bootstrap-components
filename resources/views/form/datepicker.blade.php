@props([
    'name',
    'label' => '',
    'value' => '',
    'dateFormat' => 'Y-m-d',
    'altFormat' => 'd/m/Y',
    'required' => false,
])

<div class="mb-3" x-data="{ value: '{{ $value }}' }" x-init="flatpickr($refs.input, {
        altInput: true,
        altFormat: '{{ $altFormat }}',
        dateFormat: '{{ $dateFormat }}',
        onChange: (selectedDates, dateStr) => { value = dateStr }
    })">
    @if($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <input x-ref="input" type="text" id="{{ $name }}" name="{{ $name }}" class="form-control"
           placeholder="{{ $altFormat }}" x-model="value" {{ $required ? 'required' : '' }}>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
