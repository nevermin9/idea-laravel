@props(['status' => ''])

@php
$classes = 'inline-block rounded-full border px-2 py-1 text-xs font-medium';

if ($status === 'pending') {
    $classes .= ' border-yellow-500 text-yellow-500';
} elseif ($status === 'in_progress') {
    $classes .= ' border-blue-500 text-blue-500';
} elseif ($status === 'completed') {
    $classes .= ' border-green-500 text-green-500';
} else {
    $classes .= ' border-gray-500 text-gray-500';
}
@endphp

<span {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</span>
