<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use App\Services\HolidayApi;

class AvailabilityController extends Controller
{

    // holiday API

    protected $holidays;

    public function __construct(HolidayApi $holidays)
    {
        if (!session()->has('name')) {
            abort(403, 'Please enter your name first.');
        }
        
        $this->holidays = $holidays;
    }

    //index page

    public function index(Request $request)
    {
        $query = Availability::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('sort')) {
            $dir = $request->input('direction', 'asc');
            $query->orderBy($request->sort, $dir);
        }

        $availabilities = $query->get();

        foreach ($availabilities as $availability) {
            $availability->holiday = $this->holidays->isHoliday($availability->date);
        }

        return view('availabilities.index', compact('availabilities'));
    }


    public function create()
    {
        return view('availabilities.create');
    }
    
    // storing data

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

    public function edit(Availability $availability)
    {
        return view('availabilities.edit', compact('availability'));
    }

    // update exiting field

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

    // delete

    public function destroy(Availability $availability)
    {

        $availability->delete();

        return redirect()
            ->route('availabilities.index')
            ->with('success', 'Availability deleted successfully.');
    }
}
