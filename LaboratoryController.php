<?php

// app/Http/Controllers/LaboratoryController.php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::all();
        return view('laboratories.index', compact('laboratories'));
    }

    public function create()
    {
        return view('laboratories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable',
            'equipment' => 'nullable',
        ]);

        Laboratory::create($request->all());

        return redirect()->route('laboratories.index')->with('success', 'Laboratory created successfully!');
    }

    public function show(Laboratory $laboratory)
    {
        return view('laboratories.show', compact('laboratory'));
    }

    public function edit(Laboratory $laboratory)
    {
        return view('laboratories.edit', compact('laboratory'));
    }

    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable',
            'equipment' => 'nullable',
        ]);

        $laboratory->update($request->all());

        return redirect()->route('laboratories.index')->with('success', 'Laboratory updated successfully!');
    }

    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->route('laboratories.index')->with('success', 'Laboratory deleted successfully!');
    }
}
