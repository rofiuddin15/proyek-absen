<?php

namespace App\Http\Controllers;

use App\Models\ShiftGrup;
use App\Models\ShiftPresence;
use Illuminate\Http\Request;

class ShiftGrupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ShiftGrup::all();
        return view("shift.grup.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = ShiftPresence::get();
        return view("shift.grup.add", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = ShiftGrup::create([
            'name' => $request->name,
            'shift_presence_id' => $request->shift_id,
        ]);

        if ($store) {
            return redirect()->route('shift-grup.index')->with("message", "berhasil");
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ShiftGrup $shiftGrup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShiftGrup $shiftGrup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShiftGrup $shiftGrup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftGrup $shiftGrup)
    {
        //
    }
}
