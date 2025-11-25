<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $booksCount = Book::count();
        $categoriesCount = Category::count();
        $loansCount = Loan::count();
        $activeLoans = Loan::active()->count();

        return view('dashboard.index', compact('booksCount', 'categoriesCount', 'loansCount', 'activeLoans'));
    }
}
