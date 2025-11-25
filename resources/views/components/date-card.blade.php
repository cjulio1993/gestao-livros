@props(['title', 'date', 'time' => null, 'status' => null, 'color' => 'blue'])

@php
$colorClasses = [
    'blue' => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800',
    'yellow' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800',
    'green' => 'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800',
    'red' => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800',
];
@endphp

<div class="{{ $colorClasses[$color] }} rounded-lg p-4 border">
    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">{{ $title }}</p>
    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $date ?? 'N/A' }}</p>
    @if($time)
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $time }}</p>
    @endif
    @if($status)
        <p class="text-xs {{ $status['class'] }} mt-1 {{ $status['bold'] ? 'font-semibold' : '' }}">{{ $status['text'] }}</p>
    @endif
</div>
