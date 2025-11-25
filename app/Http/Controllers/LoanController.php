<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use App\Http\Requests\StoreLoanRequest;
use App\Models\Leitores;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $query = Loan::with(['leitor', 'book']);

        if ($request->filled('status')) {
            if ($request->status === 'overdue') {
                $query->overdue();
            } else {
                $query->where('status', $request->status);
            }
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $loans = $query->orderBy('loan_date', 'desc')->paginate(15);

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::available()->orderBy('title')->get();
        $users = Leitores::where('ativo', 1)
            ->orderBy('nome')
            ->get();

            // dd($users);

        return view('loans.create', compact('books', 'users'));
    }

    public function store(Request $request)
    {
        $book = Book::findOrFail($request->book_id);

        if (!$book->isAvailable()) {
            return back()->withErrors([
                'error' => 'Livro não está disponível no momento.'
            ])->withInput();
        }

        $loan = Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => now(),
            'due_date' => now()->addDays(7),
            'status' => Loan::STATUS_ACTIVE
        ]);

        $book->decrementAvailable();

        return redirect()->route('loans.show', $loan)
            ->with('success', 'Empréstimo registrado com sucesso!');
    }

    public function show(Loan $loan)
    {
        $loan->load(['leitor', 'book']);
        // dd($loan->leitor->nome);
        
        $statusConfig = $this->getStatusConfig($loan->status);
        $canPerformActions = $loan->status === Loan::STATUS_ACTIVE;
        
        return view('loans.show', compact('loan', 'statusConfig', 'canPerformActions'));
    }
    
    private function getStatusConfig(string $status): array
    {
        $config = [
            Loan::STATUS_ACTIVE => [
                'color' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                'label' => 'Ativo',
                'icon' => 'check'
            ],
            Loan::STATUS_RETURNED => [
                'color' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                'label' => 'Devolvido',
                'icon' => 'check'
            ],
            Loan::STATUS_OVERDUE => [
                'color' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                'label' => 'Atrasado',
                'icon' => 'error'
            ],
        ];
        
        return $config[$status] ?? $config[Loan::STATUS_ACTIVE];
    }

    public function returnBook(Loan $loan)
    {
        if ($loan->status !== Loan::STATUS_ACTIVE) {
            return back()->withErrors([
                'error' => 'Este empréstimo já foi devolvido.'
            ]);
        }

        $loan->markAsReturned();

        return redirect()->route('loans.index')
            ->with('success', 'Devolução registrada com sucesso!');
    }

    public function renew(Loan $loan)
    {
        if ($loan->status !== Loan::STATUS_ACTIVE) {
            return back()->withErrors([
                'error' => 'Apenas empréstimos ativos podem ser renovados.'
            ]);
        }

        $loan->update([
            'due_date' => $loan->due_date->addDays(14)
        ]);

        return back()->with('success', 'Empréstimo renovado com sucesso!');
    }
}
