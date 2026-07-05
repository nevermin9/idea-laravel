@props([
    'title' => '',
    'description' => '',
    'timestamp' => '',
    'href' => '#',
    'status' => ''
])
<x-card class="{{ $attributes->get('class') }}">
    <h3 class="text-foreground text-lg">
        {{ $title }}
    </h3>

    <div class="mt-1">
        {{ $status }}
    </div>

    <div class="mt-5 line-clamp-3">
        {{ $description }}
    </div>

    <div class="mt-4">
        {{ $timestamp }}
    </div>

    <a
        href="{{ $href }}"
        class="text-foreground"
    >
        See More
        <span class="absolute inset-0"></span>
    </a>
</x-card>
