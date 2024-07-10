<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserProfileDataTable;

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
        return view('karyawan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);

        if ($store) {
            $makeUserProfile = UserProfile::create([
                'user_id' => $store->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            if ($makeUserProfile) {
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
