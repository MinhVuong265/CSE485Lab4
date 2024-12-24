<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $books = Book::all(); 
        return view('books.index', compact('books')); 
=======
        $books = Book::paginate(10); 
        return view('books.index', compact('books'));
        
>>>>>>> bbfed5b893c290a0a9bf5c05b58637a1a814005f
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('books.create'); 
=======
        return view('books.create');
>>>>>>> bbfed5b893c290a0a9bf5c05b58637a1a814005f
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    { 
        $request->validate([ 
            'name' => 'required', 
            'author' => 'required', 
            'category' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]); 
        Book::create($request->all()); 
        return redirect()->route('books.index') ->with('success', 'Thêm sách thành công.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
{
    // Xác thực dữ liệu đầu vào
    $validatedData = $request->validate([
        'name' => 'required', 
        'author' => 'required',
        'category' => 'required',
        'year' => 'required|integer',
        'quantity' => 'required|integer',
    ]);

    // Cập nhật thông tin sách
    $book->update($validatedData);

    // Chuyển hướng và hiển thị thông báo thành công
    return redirect()->route('books.index')->with('success', 'Book updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
