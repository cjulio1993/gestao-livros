@extends('layouts.app')
@section('title', 'Detalhes do Leitor')
@section('content')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Detalhes do Leitor
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Informações completas do leitor cadastrado no sistema
                </p>
            </div>
            <div class="flex space-x-3">
                <x-button href="{{ route('leitores.edit', $leitor) }}" color="primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Editar
                </x-button>
                <x-button href="{{ route('leitores.index') }}" color="secondary" outlined>
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                    Voltar
                </x-button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="text-center">
                        <div
                            class="mx-auto h-24 w-24 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center mb-4">
                            <span class="text-2xl font-bold text-white">
                                {{ strtoupper(substr($leitor->nome ?? 'L', 0, 1)) }}
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            {{ ucwords($leitor->nome) ?? 'Nome não informado' }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            Leitor desde {{ $leitor->created_at->format('M/Y') }}
                        </p>
                        @if ($leitor->ativo == 1)
                            <div
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                            @else
                                <div
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    <div class="w-2 h-2 bg-red-400 rounded-full mr-2"></div>
                        @endif
                        {{ $leitor->ativo == 1 ? 'Ativo' : 'Inativo' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Card -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Informações Pessoais
                    </h4>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Nome Completo
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium">
                                    {{ ucwords($leitor->nome) ?? 'Não informado' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    CPF
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium" id="cpf-display">
                                    {{ $leitor->cpf ?? 'Não informado' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    RG
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium">
                                    {{ $leitor->rg ?? 'Não informado' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Data de Nascimento
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium">
                                    {{ $leitor->data_nascimento ? \Carbon\Carbon::parse($leitor->data_nascimento)->format('d/m/Y') : 'Não informado' }}
                                </p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Email
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium">
                                    {{ $leitor->email ?? 'Não informado' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Telefone
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium">
                                    {{ $leitor->telefone ?? 'Não informado' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Endereço
                                </label>
                                <p class="text-sm text-gray-900 dark:text-white font-medium">
                                    {{ $leitor->endereco ?? 'Não informado' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Número da Carteirinha
                                </label>
                                <p
                                    class="text-sm text-gray-900 dark:text-white font-medium font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                    {{ $leitor->numero_carteirinha ?? 'Não informado' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info -->
    <div class="mt-6 bg-white dark:bg-gray-800 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                Informações do Sistema
            </h4>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                        Data de Cadastro
                    </label>
                    <p class="text-sm text-gray-900 dark:text-white font-medium">
                        {{ $leitor->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                        Última Atualização
                    </label>
                    <p class="text-sm text-gray-900 dark:text-white font-medium">
                        {{ $leitor->updated_at->format('d/m/Y H:i') }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                        ID do Sistema
                    </label>
                    <p class="text-sm text-gray-900 dark:text-white font-medium font-mono">
                        #{{ $leitor->id }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script>
            function formatCPF(cpf) {
                if (!cpf || cpf === 'Não informado') return cpf;
                const cleaned = cpf.replace(/\D/g, '');
                return cleaned.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }

            const cpfDisplay = document.getElementById('cpf-display');
            if (cpfDisplay) {
                cpfDisplay.textContent = formatCPF(cpfDisplay.textContent);
            }
        </script>
    @endpush
@endsection
