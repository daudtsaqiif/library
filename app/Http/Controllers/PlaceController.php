<?php

namespace App\Http\Controllers;

use App\Models\place;
use Exception;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $place = place::all();
        return view('place.index', compact('place'));
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
            place::create([
                'name' =>$request->name
            ]);
            return redirect()->back()->with('success', 'Place has been add');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'the name Place is same like before');
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
            $place = place::find($id);
            
            
            $place->update([
                'name' =>$request->name
            ]);
            return redirect()->back()->with('success', 'Place has change');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'the name Place is same like before');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $place = place::find($id);
            $place->delete();
            return redirect()->back()->with('success', 'place has been deleted');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'cant delete this place');
        }
    }
}
