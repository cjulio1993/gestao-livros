<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                        <!-- Sidebar -->
                        <aside class="lg:col-span-1">
                            <div class="sticky top-6 space-y-4">
                                <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-md">
                                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Navegação</h3>
                                    <nav class="mt-3 space-y-2">
                                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-100 hover:bg-gray-100">🏠 Dashboard</a>
                                        <a href="{{ route('books.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-100 hover:bg-gray-100">📚 Livros</a>
                                        <a href="{{ route('categories.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-100 hover:bg-gray-100">📑 Categorias</a>
                                        <a href="{{ route('loans.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-100 hover:bg-gray-100">📋 Empréstimos</a>
                                        <a href="{{ route('reports.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-100 hover:bg-gray-100">📊 Relatórios</a>
                                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-100 hover:bg-gray-100">⚙️ Perfil</a>
                                        <a href="#projeto-integrador" class="block px-3 py-2 rounded-md text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100">🧩 Projeto Integrador</a>
                                    </nav>
                                </div>

                                <div class="p-4 bg-white dark:bg-gray-800 rounded-md border border-gray-100">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Atalhos</h4>
                                    <div class="mt-3 grid grid-cols-1 gap-2">
                                        <a href="{{ route('books.create') }}" class="block text-sm px-3 py-2 bg-blue-600 text-white rounded-md text-center">➕ Novo Livro</a>
                                        <a href="{{ route('loans.create') }}" class="block text-sm px-3 py-2 bg-green-600 text-white rounded-md text-center">➕ Novo Empréstimo</a>
                                    </div>
                                </div>
                            </div>
                        </aside>

                        <!-- Main content -->
                        <section class="lg:col-span-3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Cards -->
                                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                    <h2 class="text-xl font-semibold text-blue-700 mb-3">Gestão de Livros</h2>
                                    <div class="space-y-2">
                                        <a href="{{ route('books.index') }}" class="block text-blue-600 hover:text-blue-800">📚 Lista de Livros</a>
                                        <a href="{{ route('books.create') }}" class="block text-blue-600 hover:text-blue-800">➕ Adicionar Novo Livro</a>
                                    </div>
                                </div>

                                <div class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                    <h2 class="text-xl font-semibold text-green-700 mb-3">Categorias</h2>
                                    <div class="space-y-2">
                                        <a href="{{ route('categories.index') }}" class="block text-green-600 hover:text-green-800">📑 Lista de Categorias</a>
                                        <a href="{{ route('categories.create') }}" class="block text-green-600 hover:text-green-800">➕ Nova Categoria</a>
                                    </div>
                                </div>

                                <div class="bg-purple-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                    <h2 class="text-xl font-semibold text-purple-700 mb-3">Empréstimos</h2>
                                    <div class="space-y-2">
                                        <a href="{{ route('loans.index') }}" class="block text-purple-600 hover:text-purple-800">📋 Empréstimos Ativos</a>
                                        <a href="{{ route('loans.create') }}" class="block text-purple-600 hover:text-purple-800">➕ Novo Empréstimo</a>
                                    </div>
                                </div>

                                <div class="bg-yellow-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                    <h2 class="text-xl font-semibold text-yellow-700 mb-3">Relatórios</h2>
                                    <div class="space-y-2">
                                        <a href="{{ route('reports.loans') }}" class="block text-yellow-600 hover:text-yellow-800">📊 Relatório de Empréstimos</a>
                                        <a href="{{ route('reports.books') }}" class="block text-yellow-600 hover:text-yellow-800">📚 Relatório de Livros</a>
                                        <a href="{{ route('reports.users') }}" class="block text-yellow-600 hover:text-yellow-800">👥 Relatório de Usuários</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Projeto Integrador React mount point -->
                            <div id="projeto-integrador" class="mt-8">
                                <h3 class="text-lg font-semibold mb-3">Projeto Integrador (visão detalhada)</h3>
                                <div id="app" class="bg-white rounded-lg shadow p-4"></div>
                                <p class="text-sm text-gray-500 mt-2">Seção interativa com informações do projeto (React).</p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
