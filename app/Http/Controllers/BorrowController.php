<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with('reader', 'book')->get();
        return view('borrow.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $readers = Reader::all();
        $books = Book::where('quantity', '>', 0)->get();
        return view('borrow.create', compact('readers', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date'
        ]);

        $book = Book::find($data['book_id']);
        if($book->quantity < 1){
            return back()->with('error', "Sách đã hết");
        }

        $existingBorrow = Borrow::where('reader_id', $data['reader_id'])->where('book_id', $book->id)->where('status', 0)->first();

        if($existingBorrow){
            return back()->with('error', "Độc giả đang mượn sách này");
        }

        Borrow::create($data);

        $book->decrement('quantity');

        return redirect()->route('borrow.index')->with('success', 'Mượn sách thành công');
    }

    /**
     * Display the specified resource.
     */
    public function showHistory(Reader $reader)
    {
        //
        $borrows = $reader->borrow()->with('book')->get();
        return view('reader.history', compact('reader', 'borrows'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function returnBook(Borrow $borrow)
    {
        $borrow->update([
            'return_date' => now(),
            'status' => 1
        ]);

        $borrow->book->increment('quantity');

        return back()->with('success', 'Trả sách thành công');
    }
}
