@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="space-y-6">
        <x-dashboard-card
            title="Relatório: Empréstimos"
            color="green"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>'
            description="Relatório detalhado de todos os empréstimos registrados na biblioteca.">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                <div class="flex items-center w-full sm:w-1/2">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input id="report-search" type="text" placeholder="Pesquisar por usuário, livro ou status..." class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <x-button href="{{ route('reports.loans') }}" color="secondary" outlined>
                        Atualizar
                    </x-button>

                    <x-button href="{{ route('reports.export', ['type' => 'csv', 'report' => 'loans']) }}" color="success" outlined>
                        Exportar Relatório
                    </x-button>

                    <x-button href="{{ route('reports.index') }}" color="secondary" outlined>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Voltar
                    </x-button>
                </div>
            </div>

            @if($loans->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">Nenhum empréstimo encontrado</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tente ajustar os filtros ou voltar ao painel principal.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Usuário</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Livro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Data Empréstimo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Vencimento</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($loans as $loan)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $loan->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                <span class="text-sm font-medium dark:text-gray-100">{{ optional($loan->leitor)->nome ? strtoupper(substr(optional($loan->leitor)->nome, 0, 1)) : '-' }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ optional($loan->leitor)->nome }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ optional($loan->leitor)->email ?? '' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ optional($loan->book)->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $loan->loan_date?->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($loan->due_date?->isPast()) bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                            @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                            {{ $loan->due_date?->format('d/m/Y') }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($loan->status === 'active') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                            @elseif($loan->status === 'returned') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                            @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">{{ ucfirst($loan->status) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $loans->links() ?? '' }}
                </div>
            @endif

        </x-dashboard-card>
    </div>
</div>

@push('scripts')
<script>
    // Busca cliente-lado simples
    const searchInput = document.getElementById('report-search');
    const table = document.querySelector('table');
    const rows = table?.querySelectorAll('tbody tr');

    searchInput?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        rows?.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
@endpush

@endsection
