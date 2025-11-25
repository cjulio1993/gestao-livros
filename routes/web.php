<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Users
    Route::resource('leitores', UsersController::class);
    
    // Livros
    Route::resource('books', BookController::class);
    Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
    Route::delete('/books/{book}/force', [BookController::class, 'forceDelete'])->name('books.force-delete');
    
    // Categorias
    Route::resource('categories', CategoryController::class);
    Route::post('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/categories/{category}/force', [CategoryController::class, 'forceDelete'])->name('categories.force-delete');
    
    // Empréstimos
    Route::resource('loans', LoanController::class);
    Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return');
    Route::post('/loans/{loan}/renew', [LoanController::class, 'renewLoan'])->name('loans.renew');
    
    // Relatórios
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/loans', [ReportController::class, 'loans'])->name('reports.loans');
    Route::get('/reports/books', [ReportController::class, 'books'])->name('reports.books');
    Route::get('/reports/users', [ReportController::class, 'users'])->name('reports.users');
    Route::get('/reports/overdue', [ReportController::class, 'overdue'])->name('reports.overdue');
    
    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
