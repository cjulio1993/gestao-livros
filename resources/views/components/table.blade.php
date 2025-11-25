@props(['headers' => [], 'striped' => true])

<div class="overflow-x-auto">
    <div class="inline-block min-w-full py-2 align-middle">
        <div class="overflow-hidden backdrop-blur-sm bg-white/90 dark:bg-gray-800/90 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-700/50">
                        @foreach($headers as $header)
                            <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">
                                {{ $header }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Estilo para linhas zebradas -->
@if($striped)
    <style>
        .stripe-row:nth-child(even) {
            @apply bg-gray-50/50 dark:bg-gray-800/50;
        }
        .stripe-row:hover {
            @apply bg-blue-50/50 dark:bg-blue-900/20 transition-colors duration-150;
        }
    </style>
@endif