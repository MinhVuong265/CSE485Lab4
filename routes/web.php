<?php
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;
// <<<<<<< HEAD
Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrow', BorrowController::class);


Route::get('/', function () {
    return redirect()->route('readers.index');
});

Route::patch('borrow/{borrow}/return',[BorrowController::class, 'returnBook'])->name('borrow.return');

Route::get('reader/{reader}/history',[BorrowController::class, 'history'])->name('readers.history');
// =======


// Route::resource('books', BookController::class);

// Route::get('/', function () {
//     return redirect()->route('brrows.index');
// });

// Route::get('/books', [BookController::class, 'index'])->name('books.index');
// Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
// Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
// Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
// Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
// Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
// // >>>>>>> bbfed5b893c290a0a9bf5c05b58637a1a814005f
