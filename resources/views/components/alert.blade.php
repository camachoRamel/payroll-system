@props([
    'type' => 'error',
    'message' => '',
])

@php
    $styles = [
        'error' => 'bg-red-700 text-red-200 border border-red-700',
        'success' => 'bg-green-500 text-white border border-green-500',
        'warning' => 'bg-yellow-700 text-yellow-200 border border-yellow-700',
        'info' => 'bg-blue-700 text-blue-200 border border-blue-700',
    ];
@endphp

<div class="{{ $styles[$type] }} p-3 rounded-xl shadow-md flex items-center gap-2">
    <p class="text-sm font-medium">{{ $message }}</p>
</div>
