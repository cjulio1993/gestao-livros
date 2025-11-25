@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="space-y-6">
        <x-dashboard-card
            title="Criar Nova Categoria"
            color="green"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>'
            description="Adicione uma nova categoria para organizar melhor seu acervo de livros.">
            
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

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nome da Categoria -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome da Categoria <span class="text-red-500">*</span>
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <input type="text" 
                            id="name"
                            name="name" 
                            value="{{ old('name') }}" 
                            class="pl-10 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-shadow duration-200 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                            placeholder="Ex: Literatura Brasileira"
                            required
                            autofocus>
                        @error('name')
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Descrição <span class="text-sm text-gray-500">(opcional)</span>
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <textarea 
                            id="description"
                            name="description" 
                            rows="4"
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-shadow duration-200 @error('description') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                            placeholder="Descreva o propósito desta categoria...">{{ old('description') }}</textarea>
                        <div class="absolute bottom-3 right-3 text-sm text-gray-400">
                            <span id="char-count">0</span>/200
                        </div>
                    </div>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-end space-x-3 pt-6">
                    <x-button 
                        type="button" 
                        color="secondary" 
                        outlined 
                        href="{{ route('categories.index') }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Voltar
                    </x-button>

                    <x-button 
                        type="submit" 
                        color="success">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Criar Categoria
                    </x-button>
                </div>
            </form>
        </x-dashboard-card>
    </div>
</div>

@push('scripts')
<script>
    // Contador de caracteres para a descrição
    const descriptionField = document.getElementById('description');
    const charCount = document.getElementById('char-count');
    
    function updateCharCount() {
        const count = descriptionField.value.length;
        charCount.textContent = count;
        
        if (count > 180) {
            charCount.classList.add('text-yellow-500');
        } else {
            charCount.classList.remove('text-yellow-500');
        }
        
        if (count > 200) {
            charCount.classList.add('text-red-500');
        } else {
            charCount.classList.remove('text-red-500');
        }
    }

    descriptionField.addEventListener('input', updateCharCount);
    updateCharCount(); // Executa na carga inicial

    // Animação suave para mensagens de erro
    document.querySelectorAll('.text-red-600').forEach(element => {
        element.style.animation = 'fadeIn 0.5s ease-in-out';
    });

    // Efeito de foco nos campos
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.closest('.relative').classList.add('transform', 'scale-[1.01]');
        });
        
        input.addEventListener('blur', () => {
            input.closest('.relative').classList.remove('transform', 'scale-[1.01]');
        });
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .relative {
        transition: transform 0.2s ease-in-out;
    }
</style>
@endpush
@endsection
