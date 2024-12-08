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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'bio' => 'required|string|max:500',
            'description' => 'required|string|max:1000',
        ]);

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
        return view('celebrity.edit', compact('celebrity'));
    }

    public function update(Request $request, Celebrity $celebrity)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'bio' => 'required|string|max:500',
            'description' => 'required|string|max:1000',
        ]);

        $celebrity->update($validated);

        return redirect()->route('celebrity.index')->with('success', 'Celebrity updated successfully!');
    }

    public function destroy($id)
    {
        $celebrity = Celebrity::findOrFail($id); // Find the celebrity by ID
        $celebrity->delete(); // Delete the celebrity record

        return redirect()->route('celebrity.index')->with('success', 'Celebrity deleted successfully!');
    }
}