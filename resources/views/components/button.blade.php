@props([
    'color' => 'primary',
    'href' => null,
    'type' => 'button',
    'size' => 'md',
    'outlined' => false,
    'flat' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]';
    
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base'
    ][$size];

    $variants = [
        'primary' => [
            'solid' => 'bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 shadow-blue-500/25',
            'outlined' => 'border-2 border-blue-500 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20',
            'flat' => 'text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20'
        ],
        'secondary' => [
            'solid' => 'bg-gradient-to-r from-gray-500 to-gray-600 text-white hover:from-gray-600 hover:to-gray-700 shadow-gray-500/25',
            'outlined' => 'border-2 border-gray-500 text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-900/20',
            'flat' => 'text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-900/20'
        ],
        'success' => [
            'solid' => 'bg-gradient-to-r from-emerald-500 to-emerald-600 text-white hover:from-emerald-600 hover:to-emerald-700 shadow-emerald-500/25',
            'outlined' => 'border-2 border-emerald-500 text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-900/20',
            'flat' => 'text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-900/20'
        ],
        'danger' => [
            'solid' => 'bg-gradient-to-r from-red-500 to-red-600 text-white hover:from-red-600 hover:to-red-700 shadow-red-500/25',
            'outlined' => 'border-2 border-red-500 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20',
            'flat' => 'text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20'
        ],
        'warning' => [
            'solid' => 'bg-gradient-to-r from-amber-500 to-amber-600 text-white hover:from-amber-600 hover:to-amber-700 shadow-amber-500/25',
            'outlined' => 'border-2 border-amber-500 text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/20',
            'flat' => 'text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/20'
        ],
        'info' => [
            'solid' => 'bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 shadow-purple-500/25',
            'outlined' => 'border-2 border-purple-500 text-purple-600 hover:bg-purple-50 dark:hover:bg-purple-900/20',
            'flat' => 'text-purple-600 hover:bg-purple-50 dark:hover:bg-purple-900/20'
        ]
    ];

    $variant = $flat ? 'flat' : ($outlined ? 'outlined' : 'solid');
    $colorClasses = $variants[$color][$variant];

    $classes = $baseClasses . ' ' . $sizeClasses . ' ' . $colorClasses;
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif