<?php
use App\Http\Controllers\ReaderController;
use Illuminate\Support\Facades\Route;
Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);
Route::get('/', function () {
    return redirect()->route('readers.index');
});
