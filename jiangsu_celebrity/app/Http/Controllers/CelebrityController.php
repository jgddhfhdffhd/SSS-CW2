<?php

namespace App\Http\Controllers;

use App\Models\Celebrity;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{
    public function index()
    {
        $celebrities = Celebrity::all();
        return view('celebrity.index', compact('celebrities'));
    }


    public function create()
    {
        return view('celebrity.create');
    }

    public function store(Request $request, $id=null)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'bio' => 'required',
            'description' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('celebrity', 'public'); // Save in storage/app/public/celebrity
            $validated['image'] = $imagePath; // Save the path in the database
        }

        if ($id) {
            // Find the existing record
            $celebrity = Celebrity::findOrFail($id);
            
            // Update the existing record
            $celebrity->update($validated);
    
            return redirect()->route('celebrity.index')->with('success', 'Celebrity updated successfully!');
        }
    
        // Create a new record if no ID is provided
        Celebrity::create($validated);
    
        return redirect()->route('celebrity.index')->with('success', 'Celebrity added successfully!');
    }
    

    public function show(Celebrity $celebrity)
    {
        return view('celebrity.show', compact('celebrity'));
    }

    public function edit($id)
    {
        $celebrity = Celebrity::findOrFail($id);
        $celebrities = Celebrity::all();
        return view('celebrity.index', compact('celebrities'));
    }

    // public function update(Request $request, Celebrity $celebrity)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'image' => 'required',
    //         'bio' => 'required',
    //         'description' => 'required',
    //     ]);
    //     $celebrity->update($validated);

    //     return redirect()->route('celebrity.index')->with('success', 'Celebrity updated successfully!');
    // }

    public function destroy($id)
    {
        $celebrity = Celebrity::findOrFail($id); // Find the celebrity by ID
        $celebrity->delete(); // Delete the celebrity record

        return redirect()->route('celebrity.index')->with('success', 'Celebrity deleted successfully!');
    }
}