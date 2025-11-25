<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    public function export(Request $request, $type = 'csv')
    {
        $report = $request->query('report', 'overdue');
        
        if ($report === 'loans') {
            $loans = Loan::with(['leitor', 'book'])->orderBy('loan_date', 'desc')->get();
            $filename = 'relatorio_emprestimos_' . now()->format('d-m-Y_H-i-s') . '.csv';
        } else {
            $loans = Loan::overdue()->with(['leitor', 'book'])->get();
            $filename = 'relatorio_atrasados_' . now()->format('d-m-Y_H-i-s') . '.csv';
        }

        if ($type === 'csv') {
            return $this->exportCsv($loans, $filename);
        }

        return back();
    }

    private function exportCsv($loans, $filename)
    {
        // dd($loans);
        if ($loans->isEmpty()) {
            return back()->with('error', 'Nenhum dado disponível para exportação.');
        }
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=$filename",
        ];

        $callback = function () use ($loans) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, ['Nº Carteirinha', 'Usuário', 'Email', 'Livro', 'Data Empréstimo', 'Vencimento', 'Status'], ';');

            foreach ($loans as $loan) {
                fputcsv($file, [
                    optional($loan->leitor)->numero_carteirinha,
                    optional($loan->leitor)->nome,
                    optional($loan->leitor)->email,
                    optional($loan->book)->title,
                    $loan->loan_date?->format('d/m/Y'),
                    $loan->due_date?->format('d/m/Y'),
                    ucfirst($loan->status) == 'Active' ? 'Emprestado' : (ucfirst($loan->status) == 'Returned' ? 'Devolvido' : 'Atrasado'),
                ], ';');
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
