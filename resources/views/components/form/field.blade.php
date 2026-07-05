@props(['name', 'label' => false, 'type' => 'text'])

<div class="space-y-2">
    @if($label)
    <label for="{{ $attributes->get('id') }}" class="label">{{ $label }}</label>
    @endif

    @if($type === 'textarea')
        <textarea
            class="textarea"
            id="{{ $attributes->get('id') }}"
            name="{{ $name }}"
            {{ $attributes }}
        >{{ old($name) }}</textarea>
    @else
        <input
            type="{{ $type }}"
            class="input"
            id="{{ $attributes->get('id') }}"
            name="{{ $name }}"
            value="{{ old($name) }}"
            {{ $attributes }}
        />
    @endif

    <x-form.error :name="$name" />
</div>
