@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
            <a href="{{ route('dashboard') }}" class="hover:text-gray-900 dark:hover:text-gray-200 transition-colors">
                Dashboard
            </a>
            <span>/</span>
            <a href="{{ route('loans.index') }}" class="hover:text-gray-900 dark:hover:text-gray-200 transition-colors">
                Empréstimos
            </a>
            <span>/</span>
            <span class="text-gray-900 dark:text-gray-100 font-medium">Empréstimo #{{ $loan->id }}</span>
        </nav>

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Empréstimo #{{ $loan->id }}</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Detalhes completos do empréstimo</p>
            </div>
            <div>
                <span
                    class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $statusConfig['color'] }}">
                    @if ($statusConfig['icon'] === 'error')
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    @else
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                    {{ $statusConfig['label'] }}
                </span>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informações do Usuário -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                    </svg>
                    Usuário
                </h2>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Nome</p>
                        <p class="text-gray-900 dark:text-gray-100 font-medium">
                            {{ ucwords(optional($loan->leitor)->nome) ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                        <p class="text-gray-900 dark:text-gray-100 font-medium">
                            {{ optional($loan->leitor)->email ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Informações do Livro -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.669 0-3.218.51-4.5 1.385A7.968 7.968 0 009 4.804z" />
                    </svg>
                    Livro
                </h2>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Título</p>
                        <p class="text-gray-900 dark:text-gray-100 font-medium">{{ optional($loan->book)->title ?? 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Autor</p>
                        <p class="text-gray-900 dark:text-gray-100 font-medium">{{ optional($loan->book)->author ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datas e Prazos -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v2H4a2 2 0 00-2 2v2h16V7a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v2H7V3a1 1 0 00-1-1zm0 5a2 2 0 002 2h8a2 2 0 002-2H6z"
                        clip-rule="evenodd" />
                </svg>
                Cronograma
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-date-card title="Data do Empréstimo" :date="$loan->loan_date?->format('d/m/Y')" :time="$loan->loan_date?->format('H:i')" color="blue" />

                @php
                    $daysRemaining = (int) abs($loan->due_date?->diffInDays(now()) ?? 0);
                    $dueStatus = $loan->isOverdue()
                        ? [
                            'text' =>
                                '⚠️ ' .
                                $loan->getDaysOverdue() .
                                ' ' .
                                ($loan->getDaysOverdue() === 1 ? 'dia' : 'dias') .
                                ' atrasado',
                            'class' => 'text-red-600 dark:text-red-400',
                            'bold' => true,
                        ]
                        : [
                            'text' =>
                                $daysRemaining .
                                ' ' .
                                ($daysRemaining === 1 ? 'dia' : 'dias') .
                                ' restante' .
                                ($daysRemaining === 1 ? '' : 's'),
                            'class' => 'text-green-600 dark:text-green-400',
                            'bold' => false,
                        ];
                @endphp



                @if ($loan->status === \App\Models\Loan::STATUS_RETURNED)
                    <x-date-card title="Data de Vencimento" :date="$loan->return_date?->format('d/m/Y')" :time="'Devolvido'" color="yellow" />
                @else
                    <x-date-card title="Data de Vencimento" :date="$loan->due_date?->format('d/m/Y')" :status="$dueStatus" color="yellow" />
                @endif

                @if ($loan->return_date)
                    <x-date-card title="Data da Devolução" :date="$loan->return_date?->format('d/m/Y')" :time="$loan->return_date?->format('H:i')" color="green" />
                @endif
            </div>
        </div>

        <!-- Ações -->
        @if ($canPerformActions)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Ações</h2>
                <div class="flex flex-wrap gap-3">
                    <form method="POST" action="{{ route('loans.return', $loan) }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Registrar Devolução
                        </button>
                    </form>
                    <form method="POST" action="{{ route('loans.renew', $loan) }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Renovar Empréstimo
                        </button>
                    </form>
                </div>
            </div>
        @endif

        <!-- Botão Voltar -->
        <div class="flex justify-start">
            <a href="{{ route('loans.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Voltar
            </a>
        </div>
    </div>
@endsection
