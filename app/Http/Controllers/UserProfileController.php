<?php

namespace App\Http\Controllers;

use App\Models\ShiftGrup;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserProfileDataTable;
use App\Http\Requests\PasswordUpdateRequest;
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
                        'user_id' => $store->id,
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
    public function show()
    {
        $data = UserProfile::with('user')->where('user_id', auth()->user()->id)->first();
        return view('karyawan.show', compact('data'));
    }

    public function updatePassword(PasswordUpdateRequest $request,string $id){
        $data = $request->validated();
        $user = User::findorfail($id);
        if ($user) {
            if (Hash::check($data['oldPassword'], $user->password)) {
                $user->update([
                    'password' => Hash::make($data['newPassword'])
                ]);

                return redirect()->route('profil.show');
            }else{
                return redirect()->back()->withErrors(["message" => "Password Lama tidak sesuai"]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = UserProfile::with('user')->where('user_id', $id)->first();
        $role = Role::all();
        $shift = ShiftGrup::all();
        $user = User::findorfail($id);
        $userRole = $user->getRoleNames();
        $userShift = UserShift::where('user_id', $id)->pluck('grup_shift_id')->toArray();
        return view('karyawan.edit', compact(['profile', 'role', 'shift', 'userRole', 'userShift']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserStoreRequest $request, string $id)
    {
        $data = $request->validated();

        $profile = UserProfile::with('user')->where('user_id', $id)->first();

        if ($profile) {
            $dt = [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'gender' => $data['gender'],
            ];
             // Update the related user fields
             $profile->update($dt);
             $profile->user->update([
                 'name' => $data['name'],
                 'email' => $data['email'],
             ]);

             if (isset($data["shift"])) {
                //** USER SHIFT */
                $currentShiftIds = UserShift::where('user_id', $id)->pluck('grup_shift_id')->toArray();
        
                $shiftsToAdd = array_diff($data['shift'], $currentShiftIds);
        
                $shiftsToRemove = array_diff($currentShiftIds, $data['shift']);
        
                // Add new shifts
                foreach ($shiftsToAdd as $shiftId) {
                    UserShift::create([
                        'user_id' => $id,
                        'grup_shift_id' => $shiftId
                    ]);
                }
        
                // Remove old shifts
                UserShift::where('user_id', $id)
                        ->whereIn('grup_shift_id', $shiftsToRemove)
                        ->delete();
             }

             if (isset($data["tugas"])) {
                $profile->user->syncRoles($data["tugas"]);
             }

             if (isset($data["label"])) {
                 if ($data['label'] == 'profil') {
                    return redirect()->route('profil.show');
                 }else{
                    return redirect()->route('karyawan.index');
                }
            }else{
                return redirect()->route('karyawan.index');
            }


            
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find user by id
        $user = User::findorfail($id);
        if ($user) {
            // find profile by userid
            $profile = UserProfile::where('user_id', $id)->first();
            // remove role
            $roles = $user->getRoleNames();
            foreach ($roles as $item) {
                $user->removeRole($item);
            }
            // get shifts by user_id
            $shift = UserShift::where('user_id', $id)->get();
            // foreach and remove shifts
            foreach ($shift as $item) {
                $item->delete();
            }

            $profile->delete();
            $user->delete();

            return redirect()->route('karyawan.index');
        }
    }
}
