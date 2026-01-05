<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'week_start_date' => 'required|date|after_or_equal:today',
            'slots.*.day_of_week' => 'required',
            'slots.*.start_time' => 'required|date_format:H:i',
            'slots.*.end_time' => 'required|after:slots.*.start_time',
        ]);
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
        $request->validate([
            'week_start_date' => 'required|date|after_or_equal:today',
            'slots.*.day_of_week' => 'required',
            'slots.*.start_time' => 'required|date_format:H:i',
            'slots.*.end_time' => 'required|after:slots.*.start_time',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
