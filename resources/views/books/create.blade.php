@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <x-dashboard-card
            title="Adicionar Novo Livro"
            color="blue"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>'
            description="Preencha os detalhes do novo livro para adicioná-lo ao acervo.">
            
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                
                <!-- Título -->
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Título do Livro
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('title') border-red-500 @enderror"
                        placeholder="Digite o título do livro">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Autor -->
                <div class="space-y-2">
                    <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Autor
                    </label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('author') border-red-500 @enderror"
                        placeholder="Nome do autor">
                    @error('author')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ISBN -->
                <div class="space-y-2">
                    <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        ISBN
                    </label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('isbn') border-red-500 @enderror"
                        placeholder="Ex: 978-3-16-148410-0">
                    @error('isbn')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categoria -->
                <div class="space-y-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Categoria
                    </label>
                    <div class="relative">
                        <select name="category_id" id="category_id"
                            class="mt-1 block w-full pl-3 pr-10 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('category_id') border-red-500 @enderror">
                            <option value="">Selecione uma categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Editora -->
                <div class="space-y-2">
                    <label for="publisher" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Editora
                    </label>
                    <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('publisher') border-red-500 @enderror"
                        placeholder="Nome da editora">
                    @error('publisher')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ano de Publicação -->
                <div class="space-y-2">
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Ano de Publicação
                    </label>
                    <input type="number" name="year" id="year" value="{{ old('year') }}" min="1900" max="{{ date('Y') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('year') border-red-500 @enderror"
                        placeholder="Ex: 2024">
                    @error('year')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantidade -->
                <div class="space-y-2">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Quantidade
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" min="1"
                            class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('quantity') border-red-500 @enderror">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <span class="text-gray-500 sm:text-sm">un</span>
                        </div>
                    </div>
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Descrição (Opcional)
                    </label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('description') border-red-500 @enderror"
                        placeholder="Breve descrição do livro">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Imagem de Capa -->
                <div class="space-y-2">
                    <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Imagem de Capa (Opcional)
                    </label>
                    <input type="file" name="cover_image" id="cover_image" accept="image/jpeg,image/png,image/jpg"
                        class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-300 @error('cover_image') border-red-500 @enderror">
                    @error('cover_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-end space-x-3 pt-6">
                    <x-button 
                        type="button" 
                        color="secondary" 
                        outlined 
                        href="{{ route('books.index') }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Voltar
                    </x-button>

                    <x-button 
                        type="submit" 
                        color="success">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Salvar Livro
                    </x-button>
                </div>
            </form>
        </x-dashboard-card>
    </div>

    @push('scripts')
    <script>
        // Adiciona máscara para o ISBN
        const isbnInput = document.getElementById('isbn');
        isbnInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^0-9X]/g, '');
            if (value.length > 13) value = value.slice(0, 13);
            
            // Formata o ISBN (para ISBN-13)
            if (value.length > 0) {
                value = value.match(/.{1,3}/g).join('-');
            }
            
            e.target.value = value;
        });

        // Animação suave ao mostrar mensagens de erro
        document.querySelectorAll('.text-red-500').forEach(element => {
            element.style.animation = 'fadeIn 0.5s ease-in-out';
        });
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        input:focus, select:focus {
            transition: all 0.2s ease-in-out;
            transform: scale(1.01);
        }
    </style>
    @endpush
@endsection
