@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Editar Categoria</h1>
        <a href="{{ route('categories.index') }}" class="text-sm text-gray-600 hover:underline">← Voltar</a>
    </div>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-50 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow sm:rounded-lg p-6">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Descrição (opcional)</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-md">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
