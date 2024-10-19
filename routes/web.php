<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IncomeController; 

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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
