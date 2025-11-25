@props(['title' => '', 'footer' => ''])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg']) }}>
    @if($title)
        <div class="border-b border-gray-200 dark:border-gray-700 p-4 bg-gray-50 dark:bg-gray-700">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $title }}</h3>
        </div>
    @endif
    
    <div class="p-6">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 border-t border-gray-200 dark:border-gray-700">
            {{ $footer }}
        </div>
    @endif
</div>