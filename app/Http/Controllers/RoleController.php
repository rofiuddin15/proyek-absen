<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::all();

        return view("role.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Permission::all();
        return view("role.add", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $add = Role::create([
            "name"=> $data["name"],
            "guard_name" => "web",
        ]);

        if ($add) {
            $permit = $add->givePermissionTo($data["permission"]);
            if ($permit) {
                return redirect()->route("role.index")->with("success","berhasil tambah data");
            }
        } else {
            return redirect()->back()->with("error","gagal simpan data");
        }
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
        $role = Role::findorfail($id);
        $currentPermission = $role->permissions->pluck('name')->toArray();
        $data = Permission::all();

        return view('role.edit', compact(['role', 'currentPermission', 'data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $data = $request->validated();
        $role = Role::findorfail($id);
        if ($data) {
            $role->update([
                'name' => $data['name']
            ]);
            $role->syncPermissions($data['permission']);

            return redirect()->route('role.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findorfail($id);
        if ($role) {
            $role->syncPermissions([]);
            $role->delete();

            return redirect()->route('role.index');
        }
    }
}
