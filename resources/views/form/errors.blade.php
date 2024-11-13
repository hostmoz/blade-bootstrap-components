@error($name)
    <div {!! $attributes->merge(['class' => 'is-invalid text-danger']) !!}>
        {{ $message }}
    </div>
@enderror