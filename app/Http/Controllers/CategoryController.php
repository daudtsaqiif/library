<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\place;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = category::all();
        $place = place::all();
        return view('category.index', compact('category', 'place'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            category::create([
                'place_id' => $request->place_id,
                'name' =>$request->name
            ]);
            return redirect()->back()->with('success', 'Category has been add');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'the name category is same like before');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $category = category::find($id); 
            
            $category->update([
                'place_id' => $request->place_id,
                'name' =>$request->name
            ]);
            return redirect()->back()->with('success', 'Category has change');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'the name category is same like before');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $category = category::find($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category has been deleted');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'cant delete this category');
        }
    }
}
