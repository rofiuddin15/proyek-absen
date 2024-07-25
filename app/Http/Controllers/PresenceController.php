<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresenceRequest;
use App\Models\PerformanceReport;
use App\Models\Presence;
use App\Models\PresenceFile;
use App\Models\ShiftGrup;
use App\Models\UserShift;
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
        Carbon::setLocale('id');
        $now = Carbon::now('Asia/Jakarta');
        $currentDay = $now->format('l');
        $currentTime = $now->format('H:i:s');
        $carbonTime = Carbon::parse($currentTime);

        $grupUser = UserShift::where('user_id', auth()->user()->id)->first();
        $shift = ShiftGrup::with('shift_presence')->where('id', $grupUser->grup_shift_id)->first();
        $check = Presence::whereDate('created_at', $now)->count();
        $checkP = Presence::whereDate('created_at', $now)->first();
        $checkKinerja = PerformanceReport::whereDate('created_at', $now)->count();
        $jam = 0;
        
        $parseStartTime = Carbon::parse($shift->shift_presence->start_time);
        $newStartHour = $parseStartTime->copy()->addHours($shift->shift_presence->range_open_presence);
        $parseEndTime = Carbon::parse($shift->shift_presence->end_time);
        $newEndHour = $parseEndTime->copy()->addHours($shift->shift_presence->range_open_presence);

         // Define the range (start and end times)
        $rangejamMasukStart= Carbon::createFromTime($parseStartTime->hour, $parseStartTime->minute, $parseStartTime->second);
        $rangejamMasukEnd= Carbon::createFromTime($newStartHour->hour, $newStartHour->minute, $newStartHour->second);
        $rangejamPulangStart = Carbon::createFromTime($parseEndTime->hour, $parseEndTime->minute, $parseEndTime->second);
        $rangejamPulangEnd = Carbon::createFromTime($newEndHour->hour, $newEndHour->minute, $newEndHour->second);

        // status jam
        // 0 = tidak ada jadwal
        // 1 = absen masuk
        // 2 = absen pulang
        // 3 = tidak bisa absen masuk 
        // 4 = tidak bisa absen pulang 
        // 5 = sudah absen masuk 
        // 6 = sudah absen pulang

        $jam2 = 0;

        // check hari
        if ($shift->day == $currentDay) {
            if ($check == 0) {
                // range checkin
                if ($carbonTime->between($rangejamMasukStart, $rangejamMasukEnd)) {
                    $jam = 1;
                } else {
                    return response()->json([$rangejamMasukStart, $rangejamMasukEnd]);
                    $jam = 3;
                }
            }else{
                if ($checkP->checkin != null) {
                    $jam2 = 1;
                } else {
                    # code...
                }
                if ($carbonTime->between($rangejamPulangStart, $rangejamPulangEnd)) {
                    $jam = 2;
                    $jam2 = 2;
                } else {
                    $jam = 4;
                }
            }
        }else{
            // do something
        }

        return view('presensi.index', compact(['check', 'checkKinerja', 'jam', 'jam2']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresenceRequest $request)
    {
        $data = $request->validated();

        if ($data) {
            $current_time = Carbon::now('Asia/Jakarta')->format('H:i');
            $presence = Presence::create([
                'user_id' => auth()->user()->id,
                'lat' => $data['latitude'],
                'lng' => $data['longitude'],
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
    public function update(PresenceRequest $request)
    {
        $data = $request->validated();
        $now = Carbon::now();


        if ($data) {
            $presence = Presence::where('user_id', auth()->user()->id)->whereDate('created_at', $now)->first();

            $current_time = Carbon::now('Asia/Jakarta')->format('H:i');
           

            if ($presence) {
                $presence->update([
                    'checkout' => $current_time
                ]);
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
            }else{
                $presence = Presence::create([
                    'user_id' => auth()->user()->id,
                    'lat' => $data['latitude'],
                    'lng' => $data['longitude'],
                    'checkout' => $current_time,
                ]);

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
     * Remove the specified resource from storage.
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
