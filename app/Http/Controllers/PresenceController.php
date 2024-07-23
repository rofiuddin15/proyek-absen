<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresenceRequest;
use App\Models\Presence;
use App\Models\PresenceFile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presensi.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresenceRequest $request)
    {
        $data = $request->validated();

        if ($data) {
            $current_time = Carbon::now()->format('H:i');
            $presence = Presence::create([
                'user_id' => auth()->user()->id,
                'checkin' => $current_time,
            ]);

            if ($presence) {
                if ($request->hasFile('photo')) {
                    $fileName = rand() .time() . '.webp';
                    $request->file('photo')->storeAs('public/presensi', $fileName);

                    PresenceFile::create([
                        'presence_id' => $presence->id,
                        'photo' => $fileName
                    ]);
                }
                if ($request->hasFile('photo2')) {
                    $fileName = rand() .time() . '.webp';
                    $request->file('photo')->storeAs('public/presensi', $fileName);

                    PresenceFile::create([
                        'presence_id' => $presence->id,
                        'photo' => $fileName
                    ]);
                }

                return redirect()->route('presensi.create');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
