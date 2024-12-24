<?php
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;
Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrow', BorrowController::class);


Route::get('/', function () {
    return redirect()->route('borrow.index');
});

Route::patch('borrow/{borrow}/return',[BorrowController::class, 'returnBook'])->name('borrow.return');

Route::get('reader/{reader}/history',[BorrowController::class, 'history'])->name('readers.history');
