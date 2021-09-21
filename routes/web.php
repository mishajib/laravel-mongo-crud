<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [TodosController::class, 'index'])->name('dashboard');
    Route::get('todos/create', [TodosController::class, 'create'])->name('todos.create');
    Route::post('todos/store', [TodosController::class, 'store'])->name('todos.store');
    Route::get('todos/{id}/edit', [TodosController::class, 'edit'])->name('todos.edit');
    Route::put('todos/{id}/update', [TodosController::class, 'update'])->name('todos.update');
    Route::delete('todos/{id}/destroy', [TodosController::class, 'destroy'])->name('todos.destroy');
});

require __DIR__ . '/auth.php';
