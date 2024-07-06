<?php

use App\Http\Controllers\AuthentikasiController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\StudentController;
use App\Models\Borrowing;
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

Route::get('/', [AuthentikasiController::class, 'login'])->name('login');
Route::post('/', [AuthentikasiController::class, 'prosesLogin']);
Route::get('/logout', [AuthentikasiController::class, 'logout']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students-edit/{id}', [StudentController::class, 'edit']);
Route::put('/students-edit/{id}', [StudentController::class, 'update']);
Route::delete('students/{id}', [StudentController::class, 'destroy']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books-edit/{id}', [BookController::class, 'edit']);
Route::put('/books-edit/{id}', [BookController::class, 'update']);
Route::delete('books/{id}', [BookController::class, 'destroy']);

Route::get('/borrowings', [BorrowingController::class, 'index']);
Route::get('/borrowings/create', [BorrowingController::class, 'create']);
Route::post('/borrowings', [BorrowingController::class, 'store']);
Route::delete('borrowings/{id}', [BorrowingController::class, 'destroy']);
Route::get('/export-pdf', [BorrowingController::class, 'export']);
