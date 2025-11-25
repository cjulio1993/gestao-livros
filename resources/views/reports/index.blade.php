@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="space-y-6">
            {{-- <x-dashboard-card
            title="Relatórios"
            color="indigo"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/>
            </svg>'
            description="Acesse os relatórios do sistema para analisar empréstimos e irregularidades."> --}}
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">
                        Relatórios
                    </h1>
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                        Acesse os relatórios do sistema para analisar empréstimos e irregularidades.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('reports.loans') }}"
                    class="block p-4 rounded-lg bg-white dark:bg-gray-800 border hover:shadow-lg transition">
                    <div class="flex items-start">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-indigo-50 dark:bg-indigo-900 text-indigo-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Todos os Empréstimos</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lista completa de empréstimos com
                                datas, usuários e status.</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('reports.overdue') }}"
                    class="block p-4 rounded-lg bg-white dark:bg-gray-800 border hover:shadow-lg transition">
                    <div class="flex items-start">
                        <div
                            class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-red-50 dark:bg-red-900 text-red-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12A9 9 0 1112 3a9 9 0 019 9z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Empréstimos Atrasados</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Relatório com empréstimos que passaram
                                da data de devolução prevista.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mt-6 flex justify-end">
                <x-button href="{{ route('dashboard') }}" color="secondary" outlined>
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Voltar ao Dashboard
                </x-button>
            </div>
            {{-- </x-dashboard-card> --}}
        </div>
    </div>
@endsection
