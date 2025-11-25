@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">
                    Gerenciamento de Livros
                </h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                    Gerencie o acervo da biblioteca, adicione novos livros e monitore a disponibilidade.
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <x-button href="{{ route('dashboard') }}" color="secondary" outlined>
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </x-button>
                <x-button href="{{ route('books.create') }}" color="primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Novo Livro
                </x-button>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" 
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Pesquisar livros...">
                    <div class="absolute left-3 top-2.5">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex gap-4">
                <select class="rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Todas as Categorias</option>
                    @foreach($books->pluck('category.name')->unique() as $category)
                        @if($category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endif
                    @endforeach
                </select>
                <select class="rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Status</option>
                    <option value="available">Disponível</option>
                    <option value="unavailable">Indisponível</option>
                </select>
            </div>
        </div>

        <!-- Books List -->
        @if($books->isEmpty())
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Nenhum livro encontrado</h3>
                <p class="text-gray-500 dark:text-gray-400">Comece adicionando um novo livro ao acervo.</p>
            </div>
        @else
            <div class="overflow-hidden">
                <div class="overflow-x-auto">
                    <x-table :headers="['Título', 'Autor', 'Categoria', 'Disponíveis', 'Ações']">
                        @foreach($books as $book)
                            <tr class="stripe-row">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $book->title }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                ISBN: {{ $book->isbn }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">{{ $book->author }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($book->category)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                            {{ $book->category->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500">Sem categoria</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($book->available > 0)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                            <span class="text-green-800 dark:text-green-200">{{ $book->available }} unid.</span>
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                            <span class="text-red-800 dark:text-red-200">Indisponível</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <x-button href="{{ route('books.show', $book) }}" color="primary" flat size="sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </x-button>
                                    <x-button href="{{ route('books.edit', $book) }}" color="info" flat size="sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </x-button>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $books->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        // Adiciona efeito de hover nas linhas da tabela
        document.querySelectorAll('.stripe-row').forEach(row => {
            row.addEventListener('mouseover', function() {
                this.classList.add('bg-blue-50', 'dark:bg-blue-900/20');
            });
            row.addEventListener('mouseout', function() {
                this.classList.remove('bg-blue-50', 'dark:bg-blue-900/20');
            });
        });
    </script>
    @endpush
@endsection
