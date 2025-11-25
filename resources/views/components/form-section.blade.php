@props(['title' => '', 'description' => ''])

<div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
    <div class="p-6">
        @if($title)
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $title }}</h2>
                @if($description)
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $description }}</p>
                @endif
            </div>
        @endif

        <div class="space-y-6">
            {{ $slot }}
        </div>
    </div>
</div>