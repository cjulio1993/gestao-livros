@props([
    'title',
    'icon' => null,
    'value' => null,
    'description' => null,
    'trend' => null,
    'trendValue' => null,
    'color' => 'blue'
])

@php
    $colors = [
        'blue' => [
            'bg' => 'bg-gradient-to-br from-blue-500 to-blue-600',
            'text' => 'text-blue-600',
            'light' => 'bg-blue-100',
            'border' => 'border-blue-200',
            'hover' => 'hover:bg-blue-50'
        ],
        'purple' => [
            'bg' => 'bg-gradient-to-br from-purple-500 to-purple-600',
            'text' => 'text-purple-600',
            'light' => 'bg-purple-100',
            'border' => 'border-purple-200',
            'hover' => 'hover:bg-purple-50'
        ],
        'green' => [
            'bg' => 'bg-gradient-to-br from-emerald-500 to-emerald-600',
            'text' => 'text-emerald-600',
            'light' => 'bg-emerald-100',
            'border' => 'border-emerald-200',
            'hover' => 'hover:bg-emerald-50'
        ],
        'yellow' => [
            'bg' => 'bg-gradient-to-br from-amber-500 to-amber-600',
            'text' => 'text-amber-600',
            'light' => 'bg-amber-100',
            'border' => 'border-amber-200',
            'hover' => 'hover:bg-amber-50'
        ],
        'red' => [
            'bg' => 'bg-gradient-to-br from-red-500 to-red-600',
            'text' => 'text-red-600',
            'light' => 'bg-red-100',
            'border' => 'border-red-200',
            'hover' => 'hover:bg-red-50'
        ]
    ][$color];
@endphp

<div {{ $attributes->merge(['class' => 'relative group overflow-hidden']) }}>
    <div class="backdrop-blur-sm bg-white/90 dark:bg-gray-800/90 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm transition-all duration-300 group-hover:shadow-lg group-hover:scale-[1.02] p-6">
        <div class="flex-1">
            <div class="flex items-center space-x-2">
                @if($icon)
                    <div class="p-2 rounded-lg {{ $colors['light'] }} {{ $colors['text'] }}">
                        {!! $icon !!}
                    </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $title }}
                </h3>
            </div>
        <div class="flex items-center justify-between">
                
                @if($value)
                    <div class="mt-4 flex items-baseline">
                        <p class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $value }}
                        </p>
                        @if($trend)
                            <span class="ml-2 text-sm font-medium {{ $trend === 'up' ? 'text-green-600' : 'text-red-600' }}">
                                @if($trend === 'up')
                                    ↑ {{ $trendValue }}
                                @else
                                    ↓ {{ $trendValue }}
                                @endif
                            </span>
                        @endif
                    </div>
                @endif

                @if($description)
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $description }}
                    </p>
                @endif
            </div>

            @if($slot->isNotEmpty())
                <div class="mt-4">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>

    <!-- Efeito de gradiente no hover -->
    <div class="absolute inset-0 -z-10 rounded-xl transition-opacity duration-300 opacity-0 group-hover:opacity-10 {{ $colors['bg'] }}"></div>
</div>