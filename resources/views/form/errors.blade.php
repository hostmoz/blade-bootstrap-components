@error($name)
    <div {!! $attributes->merge(['class' => 'invalid-feedback']) !!} role="alert">
        <i class="fas fa-exclamation-circle me-1"></i>
        {{ $message }}
    </div>
@enderror