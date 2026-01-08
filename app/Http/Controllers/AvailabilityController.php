<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use App\Services\HolidayApi;

class AvailabilityController extends Controller
{
    protected $holidays;

    public function __construct(HolidayApi $holidays)
    {
        if (!session()->has('name')) {
            abort(403, 'Please enter your name first.');
        }
        
        $this->holidays = $holidays;
    }

    public function index()
    {
        $availabilities = Availability::all();

        foreach ($availabilities as $availability) {
            $availability->holiday = $this->holidays->isHoliday($availability->date);
        }

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

        Availability::create([
            'name' => session('name'),
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_id' => session('user_id'),
        ]);

        return redirect()->route('availabilities.index');
    }

    public function show(string $id)
    {
        
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
