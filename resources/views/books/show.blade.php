@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Autor:</strong> {{ $book->author }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    <p><strong>Categoria:</strong> {{ optional($book->category)->name }}</p>
    <p><strong>Quantidade:</strong> {{ $book->quantity }}</p>
    <p><strong>Disponíveis:</strong> {{ $book->available }}</p>

    <h3>Empréstimos ativos</h3>
    @if($activeLoans->isEmpty())
        <p>Nenhum empréstimo ativo.</p>
    @else
        <ul>
            @foreach($activeLoans as $loan)
                <li>{{ optional($loan->user)->name }} - {{ $loan->loan_date?->format('Y-m-d') }}</li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="{{ route('books.edit', $book) }}">Editar</a> |
        <a href="{{ route('books.index') }}">Voltar</a>
    </p>
@endsection
