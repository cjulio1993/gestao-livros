@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="space-y-6">
        <x-dashboard-card
            title="Registrar Novo Empréstimo"
            color="blue"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>'
            description="Preencha os dados abaixo para registrar um novo empréstimo de livro.">

            @if($errors->any())
                <div class="mb-6">
                    <div class="rounded-lg bg-red-50 dark:bg-red-900/50 p-4 border-l-4 border-red-500">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <span class="text-sm font-medium text-red-800 dark:text-red-200">Por favor, corrija os seguintes erros:</span>
                        </div>
                        <ul class="ml-8 list-disc text-sm text-red-700 dark:text-red-300">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('loans.store') }}" class="space-y-6">
                @csrf

                <!-- Seleção do Usuário -->
                <div class="space-y-2">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Usuário <span class="text-red-500">*</span>
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <select 
                            id="user_id"
                            name="user_id" 
                            class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow duration-200"
                            required>
                            <option value="">Selecione um usuário...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Seleção do Livro -->
                <div class="space-y-2">
                    <label for="book_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Livro <span class="text-red-500">*</span>
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <select 
                            id="book_id"
                            name="book_id" 
                            class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow duration-200"
                            required>
                            <option value="">Selecione um livro...</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" 
                                    {{ old('book_id') == $book->id ? 'selected' : '' }}
                                    {{ $book->available ? '' : 'disabled' }}
                                    class="{{ $book->available ? 'text-gray-100' : 'text-gray-400' }}">
                                    {{ $book->title }} 
                                    @if($book->available)
                                        (Disponível)
                                    @else
                                        (Indisponível)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Data de Devolução Prevista (Opcional) -->
                <div class="space-y-2">
                    <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Data de Devolução Prevista <span class="text-sm text-gray-500">(opcional)</span>
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input 
                            type="date" 
                            id="due_date"
                            name="due_date" 
                            value="{{ old('due_date') }}"
                            min="{{ date('Y-m-d') }}"
                            class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow duration-200">
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Se não informada, será considerado o prazo padrão de 7 dias.
                    </p>
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-end space-x-3 pt-6">
                    <x-button 
                        type="button" 
                        color="secondary" 
                        outlined 
                        href="{{ route('loans.index') }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Voltar
                    </x-button>

                    <x-button 
                        type="submit" 
                        color="primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Registrar Empréstimo
                    </x-button>
                </div>
            </form>
        </x-dashboard-card>
    </div>
</div>

@push('scripts')
<script>
    // Validação em tempo real e feedback visual
    const selects = document.querySelectorAll('select');
    
    selects.forEach(select => {
        select.addEventListener('change', function() {
            const container = this.closest('.relative');
            if (this.value) {
                container.classList.add('ring-2', 'ring-green-500', 'border-green-500');
            } else {
                container.classList.remove('ring-2', 'ring-green-500', 'border-green-500');
            }
        });

        // Animação de foco
        select.addEventListener('focus', () => {
            select.closest('.relative').classList.add('transform', 'scale-[1.01]');
        });
        
        select.addEventListener('blur', () => {
            select.closest('.relative').classList.remove('transform', 'scale-[1.01]');
        });
    });

    // Configuração da data mínima
    const dueDateInput = document.getElementById('due_date');
    if (dueDateInput) {
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        dueDateInput.min = tomorrow.toISOString().split('T')[0];
    }
</script>
@endpush

@endsection
