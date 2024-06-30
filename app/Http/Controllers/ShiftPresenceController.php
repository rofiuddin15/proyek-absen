<?php

namespace App\Http\Controllers;

use App\Models\ShiftPresence;
use Illuminate\Http\Request;

class ShiftPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ShiftPresence::all();
        return view("shift.absen.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("shift.absen.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShiftPresence $shiftPresence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShiftPresence $shiftPresence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShiftPresence $shiftPresence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftPresence $shiftPresence)
    {
        //
    }
}
