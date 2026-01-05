<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
       public function index()
    {
        $availabilities = Availability::latest()->get();
        return view('availabilities.index', compact('availabilities'));
    }

    public function create()
    {
        return view('availabilities.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Availability::create($request->all());
        
        return redirect()->route('availabilities.index')
                         ->with('success', 'Availability created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('availabilities.edit', compact('availability'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $availability->update($request->all());

        return redirect()->route('availabilities.index')
                         ->with('success', 'Availability updated successfully.');
    }

    public function destroy(string $id)
    {
        $availability->delete();

        return redirect()->route('availabilities.index')
                         ->with('success', 'Availability deleted successfully.');
    }
}
