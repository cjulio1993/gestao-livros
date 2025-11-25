<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('available') && $request->available == '1') {
            $query->available();
        }

        $books = $query->orderBy('title')->paginate(15);
        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        // dd($data);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')
                ->store('books/covers', 'public');
        }

        $data['available'] = $data['quantity'];

        $book = Book::create($data);

        return redirect()->route('books.show', $book)
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function show(Book $book)
    {
        $book->load(['category', 'loans.user']);
        
        $activeLoans = $book->loans()
            ->active()
            ->with('user')
            ->get();

        return view('books.show', compact('book', 'activeLoans'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            
            $data['cover_image'] = $request->file('cover_image')
                ->store('books/covers', 'public');
        }

        $book->update($data);

        return redirect()->route('books.show', $book)
            ->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        if ($book->loans()->active()->exists()) {
            return back()->withErrors([
                'error' => 'Não é possível excluir livro com empréstimos ativos.'
            ]);
        }

        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Livro excluído com sucesso!');
    }
}
