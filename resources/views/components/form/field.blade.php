@props(['name', 'label', 'type' => 'text'])

<div class="space-y-2">
    <label for="{{ $attributes->get('id') }}" class="label">{{ $label }}</label>
    <input
        type="{{ $type }}"
        class="input"
        id="{{ $attributes->get('id') }}"
        name="{{ $name }}"
        value="{{ old($name) }}"
        {{ $attributes }} />

    @error($name)
    <p class="error">
        {{ $message }}
    </p>
    @enderror
</div>
