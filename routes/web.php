<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IncomeController; 
use App\Http\Controllers\ExpenseController; 
use App\Http\Controllers\SettingController; 
use App\Http\Controllers\InvoiceController; 

// Route::get('/', function () {
//     return view('layouts.master');
// });

// Route::get('/dashboard1', function () {
//     return view('admin.dashboard.index');
// });

// Route::get('/client', function () {
//     return view('admin.client.add');
// });

Route::get('/dashboard', function () {
    return view('layouts.master');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/show/client', [ClientController::class, 'show'])->middleware('auth') ;
Route::get('/edit/client/{id}', [ClientController::class, 'edit'])->middleware('auth');

Route::get('/delete/{id}', [ClientController::class, 'destroy'])->middleware('auth');

Route::get('/client', [ClientController::class, 'index'])->name('client')->middleware('auth');
Route::post('/client/submit', [ClientController::class, 'create'])->middleware('auth');
Route::post('/client/update', [ClientController::class, 'update'])->middleware('auth');

Route::get('/project', [ProjectController::class, 'add'])->middleware('auth');
Route::post('/project/submit', [ProjectController::class, 'store'])->middleware('auth');
Route::get('/project/show', [ProjectController::class, 'show'])->middleware('auth');
Route::get('edit/project/{id}', [ProjectController::class, 'edit'])->middleware('auth');
Route::post('/project/update', [ProjectController::class, 'update'])->middleware('auth');


Route::get('/income', [IncomeController::class, 'add'])->middleware('auth');
Route::post('/income/submit', [IncomeController::class, 'store'])->middleware('auth');
Route::get('/income/show', [IncomeController::class,'show'])->middleware('auth');
Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->middleware('auth');
Route::post('/income/update', [IncomeController::class, 'update'])->middleware('auth');
Route::get('/income/filter', [IncomeController::class,'filter'])->middleware('auth');

Route::get('/expense', [ExpenseController::class, 'add'])->middleware('auth');
Route::post('/expense/submit', [ExpenseController::class, 'store'])->middleware('auth');
Route::get('/expense/show', [ExpenseController::class, 'show'])->middleware('auth');
Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->middleware('auth');
Route::post('/expense/update', [ExpenseController::class, 'update'])->middleware('auth'); 



Route::get('/setting', [SettingController::class, 'edit'])->middleware('auth');
Route::post('/setting/update', [SettingController::class, 'update'])->middleware('auth');

Route::get('/invoice/create/{id}', [InvoiceController::class, 'index'])->middleware('auth');
Route::get('/invoice/pdf/{id}', [InvoiceController::class, 'pdf'])->middleware('auth');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
