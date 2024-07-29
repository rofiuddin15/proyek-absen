<?php

namespace App\Http\Controllers;

use App\DataTables\GrupShiftDataTable;
use App\Models\ShiftGrup;
use App\Models\ShiftPresence;
use Illuminate\Http\Request;

class ShiftGrupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GrupShiftDataTable $dataTable)
    {
        // $data = ShiftGrup::all();
        // return view("shift.grup.index", compact("data"));
        return $dataTable->render("shift.grup.index");
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
            'day' => $request->day,
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
        $data = ShiftGrup::findOrFail($shiftGrup->id);
        $shift = ShiftPresence::all();
        return view('shift.grup.edit', compact(['data', 'shift']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShiftGrup $shiftGrup)
    {
        $update = ShiftGrup::findOrFail($shiftGrup->id);
        $update->name = $request->name;
        $update->shift_presence_id = $request->shift_id;
        $update->day = $request->day;

        if($update->update())
        {
            toastr()->success('Grup Shift berhasil di update');
            return redirect()->route('shift-grup.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftGrup $shiftGrup)
    {
        //
    }
}
