<?php

namespace App\Http\Controllers;

use App\Models\Availability;
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

    public function edit(Availability $availability)
    {
        return view('availabilities.edit', compact('availability'));
    }

    public function update(Request $request, Availability $availability)
    {
    $availability->update([
        'date' => $request->date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->route('availabilities.index')
        ->with('success', 'Availability updated successfully');
    }


    public function destroy(Availability $availability)
    {
    $availability->delete();

    return redirect()
        ->route('availabilities.index')
        ->with('success', 'Availability deleted successfully.');
    }
}
