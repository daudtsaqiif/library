<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use App\Models\place;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $book = book::all();
        return view('book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = category::all();
        $place = place::all();
        return view('book.create', compact('category', 'place'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'place_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'edition' => 'required',
            'publishing' => 'required',
            'isbn' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'pdf' => 'required|mimes:pdf'
        ]);
        try {

            $data = $request->all();

            $image = $request->file('image');
            $image->storeAs('public/book', $image->hashName());

            $pdf = $request->file('pdf');
            $pdf->storeAs('public/pdf', $pdf->hashName());

            $data['image'] = $image->hashName();
            $data['pdf'] = $pdf->hashName();

            book::create($data);

            return redirect()->route('book.index')->with('success', 'book has been add');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'cant add book');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = category::all();
        $place = place::all();
        $book = book::find($id);
        return view('book.edit', compact('category', 'place', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'place_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'edition' => 'required',
            'publishing' => 'required',
            'isbn' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg',
            'pdf' => 'mimes:pdf'
        ]);

        try {
            $book = book::find($id);
            $data = $request->all();

            if (!$request->file('image') == '') {
                Storage::disk('local')->delete('public/book/' . basename($book->image));

                $image = $request->file('image');
                $image->storeAs('public/book', $image->hashName());

                $data['image'] = $image->hashName();

            }
            if (!$request->file('pdf') == '') {
                Storage::disk('local')->delete('public/pdf/' . basename($book->pdf));

                $pdf = $request->file('pdf');
                $pdf->storeAs('public/pdf', $pdf->hashName());

                $data['pdf'] = $pdf->hashName();
            }
            $book->update($data);
            return redirect()->route('book.index')->with('success', 'book has been Update');

        } catch (Exception $e) {
            // dd($e->getMessage());
                return redirect()->back()->with('error', 'cant update book');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //find category
            $book = book::find($id);

            //delete image
            Storage::disk('local')->delete('public/book/' . basename($book->image));
            Storage::disk('local')->delete('public/pdf/' . basename($book->pdf));


            $book->delete();

            return redirect()->back()->with('success', 'deleted the book');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete the book');
        }
    }
}
