@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <x-dashboard-card title="Adicionar Novo Leitor" color="blue"
            icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zm-13-3a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>'
            description="Preencha os detalhes do novo leitor para adicioná-lo ao acervo.">
            <form method="POST" action="{{ route('leitores.store') }}">
                @csrf
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900 dark:text-white @error('name') border-red-500 @enderror"
                        placeholder="Digite o nome do usuário">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CPF -->
                <div class="space-y-2">
                    <label for="cpf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        CPF
                    </label>
                    <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:text-white @error('cpf') border-red-500 @enderror"
                        placeholder="Digite o CPF do usuário">
                    @error('cpf')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- RG  -->
                <div class="space-y-2">
                    <label for="rg" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        RG
                    </label>
                    <input type="text" name="rg" id="rg" value="{{ old('rg') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:text-white @error('rg') border-red-500 @enderror"
                        placeholder="Digite o RG do usuário">
                    @error('rg')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- DATA DE NASCIMENTO -->
                <div class="space-y-2">
                    <label for="data_nascimento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Data de Nascimento
                    </label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:text-white @error('data_nascimento') border-red-500 @enderror">
                    @error('data_nascimento')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telefone -->
                <div class="space-y-2">
                    <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Telefone
                    </label>
                    <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:text-white @error('telefone') border-red-500 @enderror"
                        placeholder="Digite o telefone do usuário">
                    @error('telefone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Email
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:text-white @error('email') border-red-500 @enderror">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <span class="text-gray-500 sm:text-sm">un</span>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- endereço -->
                <div class="space-y-2">
                    <label for="endereco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Endereço
                    </label>
                    <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:text-white @error('endereco') border-red-500 @enderror"
                        placeholder="Digite o endereço do usuário">
                    @error('endereco')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-end space-x-3 pt-6">
                    <x-button type="button" color="secondary" outlined href="{{ route('leitores.index') }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Voltar
                    </x-button>

                    <x-button type="submit" color="success">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Salvar Leitor
                    </x-button>
                </div>
            </form>
        </x-dashboard-card>
    </div>

    @push('scripts')
        <script>
            // Adiciona máscara para o CPF
            const isbnInput = document.getElementById('cpf');
            isbnInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^0-9X]/g, '');
                if (value.length > 11) value = value.slice(0, 11);

                // Formata o CPF como XXX.XXX.XXX-XX
                if (value.length > 9) {
                    value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
                } else if (value.length > 6) {
                    value = value.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
                } else if (value.length > 3) {
                    value = value.replace(/(\d{3})(\d{1,3})/, '$1.$2');
                }

                e.target.value = value;
            });

            // Adiciona máscara para o RG
            const rgInput = document.getElementById('rg');
            rgInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^0-9X]/g, '');
                if (value.length > 9) value = value.slice(0, 9);

                // Formata o RG como XX.XXX.XXX-X
                if (value.length > 8) {
                    value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
                } else if (value.length > 5) {
                    value = value.replace(/(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
                } else if (value.length > 2) {
                    value = value.replace(/(\d{2})(\d{1,3})/, '$1.$2');
                }

                e.target.value = value;
            });

            // Adiciona máscara para o telefone
            const telefoneInput = document.getElementById('telefone');
            telefoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 11) value = value.slice(0, 11);

                // Formata o telefone como (XX) XXXXX-XXXX ou (XX) XXXX-XXXX
                if (value.length > 10) {
                    value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                } else if (value.length > 6) {
                    value = value.replace(/(\d{2})(\d{4})(\d{1,4})/, '($1) $2-$3');
                } else if (value.length > 2) {
                    value = value.replace(/(\d{2})(\d{1,5})/, '($1) $2');
                }

                e.target.value = value;
            });

            // Adiciona máscara para o email
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('input', function(e) {
                let value = e.target.value;
                // Remove espaços
                value = value.replace(/\s/g, '');
                e.target.value = value;
            });

            // Animação suave ao mostrar mensagens de erro
            document.querySelectorAll('.text-red-500').forEach(element => {
                element.style.animation = 'fadeIn 0.5s ease-in-out';
            });
        </script>

        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            input:focus,
            select:focus {
                transition: all 0.2s ease-in-out;
                transform: scale(1.01);
            }
        </style>
    @endpush
@endsection
