<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $readers = Reader::all();
        return view('readers.index', compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('readers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Reader::create($request->all());

        return redirect()->route('readers.index')->with('success', 'Reader created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reader $reader)
    {
        //
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reader $reader)
    {
        //
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reader $reader)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $reader->update($validatedData);

        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reader $reader)
    {
        //
        $reader->delete();

        return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
