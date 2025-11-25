@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Categoria: {{ $category->name }}</h1>
        <div class="space-x-2">
            <a href="{{ route('categories.edit', $category) }}" class="px-3 py-2 bg-yellow-500 text-white rounded-md">Editar</a>
            <a href="{{ route('categories.index') }}" class="text-sm text-gray-600 hover:underline">← Voltar</a>
        </div>
    </div>

    <div class="bg-white shadow sm:rounded-lg p-6">
        <dl>
            <div class="mb-4">
                <dt class="text-sm font-medium text-gray-500">Nome</dt>
                <dd class="mt-1 text-lg text-gray-900">{{ $category->name }}</dd>
            </div>

            <div class="mb-4">
                <dt class="text-sm font-medium text-gray-500">Descrição</dt>
                <dd class="mt-1 text-gray-700">{{ $category->description ?? '—' }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Status</dt>
                <dd class="mt-1">
                    @if($category->trashed())
                        <span class="text-sm text-red-600">Excluída</span>
                    @else
                        <span class="text-sm text-green-600">Ativa</span>
                    @endif
                </dd>
            </div>
        </dl>
    </div>
</div>
@endsection
