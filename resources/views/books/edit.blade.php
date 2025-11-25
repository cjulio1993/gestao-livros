@extends('layouts.app')

@section('content')
    <h1>Editar Livro</h1>

    <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Título</label><br>
            <input type="text" name="title" value="{{ old('title', $book->title) }}">
        </div>
        <div>
            <label>Autor</label><br>
            <input type="text" name="author" value="{{ old('author', $book->author) }}">
        </div>
        <div>
            <label>ISBN</label><br>
            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">
        </div>
        <div>
            <label>Categoria</label><br>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $book->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Quantidade</label><br>
            <input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}">
        </div>
        <div>
            <button type="submit">Atualizar</button>
        </div>
    </form>

    <p><a href="{{ route('books.show', $book) }}">Voltar</a></p>
@endsection
