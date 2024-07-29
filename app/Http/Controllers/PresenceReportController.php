<?php

namespace App\Http\Controllers;

use App\DataTables\RekapPresenceAdminDataTable;
use App\DataTables\RekapPresenceDataTable;
use App\Models\Presence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresenceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RekapPresenceDataTable $dataTable, RekapPresenceAdminDataTable $dataTableAdmin)
    {
        $user = User::findorfail(auth()->user()->id);
        if ($user->hasPermissionTo('RekapPresensi Read(Admin)')) {
            return $dataTableAdmin->render('laporan.presensi.index');
        } else {
            return $dataTable->render('laporan.presensi.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
