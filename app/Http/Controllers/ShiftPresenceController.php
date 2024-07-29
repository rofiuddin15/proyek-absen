<?php

namespace App\Http\Controllers;

use App\DataTables\ShiftDataTable;
use App\Models\ShiftPresence;
use Illuminate\Http\Request;

class ShiftPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShiftDataTable $dataTable)
    {
        $data = ShiftPresence::all();
        // return view("shift.absen.index", compact("data"));
        return $dataTable->render("shift.absen.index");
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
        $store = ShiftPresence::create([
            "name" => $request->name,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "range_open_presence" => $request->range_open,
        ]);

        if ($store) {
            return redirect()->route("shift-absen.index")->with("success","berhasil input data");
        } else {
            return redirect()->back()->with("error","terjadi kesalahan");
        }
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
    public function edit($id)
    {
        $data = ShiftPresence::where('id', $id)->first();
        return view('shift.absen.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = ShiftPresence::findOrFail($id);
        $data->name = $request->name;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->range_open_presence = $request->range_open;
        if($data->update())
        {
            toastr()->success('Shift berhasil di update');
            return redirect()->route('shift-absen.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftPresence $shiftPresence)
    {
        //
    }
}
