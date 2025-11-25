<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function loans()
    {
        $loans = Loan::with(['leitor', 'book'])->orderBy('loan_date', 'desc')->paginate(25);
        return view('reports.loans', compact('loans'));
    }

    public function overdue()
    {
        $loans = Loan::overdue()->with(['leitor', 'book'])->get();
        return view('reports.overdue', compact('loans'));
    }
}
