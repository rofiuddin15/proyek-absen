<?php

namespace App\Http\Controllers;

use App\DataTables\PerformanceReportsDataTable;
use App\Models\PerformanceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerformanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PerformanceReportsDataTable $dataTable)
    {
        // $data = PerformanceReport::with('file')->orderBy("created_at","desc")->paginate(10);
        
        // return view("laporan.kinerja.index", compact("data"));
        return $dataTable->render('laporan.kinerja.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.kinerja.add');
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
    public function show(PerformanceReport $performanceReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerformanceReport $performanceReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerformanceReport $performanceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerformanceReport $performanceReport)
    {
        //
    }
}
