<?php

namespace App\Http\Controllers;

use App\Models\ShiftGrup;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserProfileDataTable;
use App\Http\Requests\UserStoreRequest;
use App\Models\UserShift;
use Spatie\Permission\Models\Role;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserProfileDataTable $dataTable)
    {
        // $data = UserProfile::with('user')->get();
        return $dataTable->render('karyawan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        $shift = ShiftGrup::all();
        return view('karyawan.add', compact(['role', 'shift']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        // return response()->json($data["shift"]);
        $store = User::create([
            'name' => $data["name"],
            'email' => $data["email"],
            'password' => Hash::make('12345678'),
        ]);

        if ($store) {
            $makeUserProfile = UserProfile::create([
                'user_id' => $store->id,
                'first_name' => $data["first_name"],
                'last_name' => $data["last_name"],
                'gender' => $data["gender"],
                'phone' => $data["phone"],
                'address' => $data["address"],
            ]);

            if ($makeUserProfile) {
                // Assign Role
                $store->assignRole($data["tugas"]);

                // Assign Shift
                foreach ($data["shift"] as $item) {
                    UserShift::create([
                        'user_id' => auth()->user()->id,
                        'grup_shift_id' => $item
                    ]);
                }
                return redirect()->route('karyawan.index');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
