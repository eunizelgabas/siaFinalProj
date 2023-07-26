<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PdfController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('employees', EmployeeController::class);
    Route::get('/employees/pdf/{employee}', [PdfController::class, 'employeeSummary']);
    Route::get('/employee/pdf', [PdfController::class, 'totalEmployee']);
    Route::get('/employees/edit/{employee}', [EmployeeController::class,'edit']);
    Route::get('/employees/search/{searchKey}', [EmployeeController::class, 'search']);
    Route::post('/employees/toggle/{employee}', [EmployeeController::class, 'toggleActive']);
    Route::get('/employees/email/{employee}', [EmployeeController::class, 'email']);

    Route::resource('expenses', ExpenseController::class);
    Route::get('/expenses/edit/{expense}', [ExpenseController::class,'edit']);
    Route::get('/expenses/search/{searchKey}', [ExpenseController::class, 'search']);

    Route::resource('admin', AdminController::class);
    Route::post('/admin/send-email', [AdminController::class, 'bulkEmail']);
});
