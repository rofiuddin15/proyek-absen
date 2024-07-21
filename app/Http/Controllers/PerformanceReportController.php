<?php

namespace App\Http\Controllers;

use App\DataTables\PerformanceReportsDataTable;
use App\Http\Requests\PerformanceReportRequest;
use App\Models\PerformanceReport;
use App\Models\PerformanceReportFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PerformanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PerformanceReportsDataTable $dataTable)
    {
        // $data = PerformanceReport::with('file')->orderBy("created_at","desc")->paginate(10);
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
    public function store(PerformanceReportRequest $request)
    {
        // getdata description & get file
        $data = $request->validated();
        // get auth user
        // $authId = Auth::user()->id;
        $authId = 1;

        //buat performance report
        $report = PerformanceReport::create([
            'user_id' => $authId,
            'report_description' => $data['report_description']
        ]);

        if ($report) {
            $fileName = "original";

            if($request->hasFile('report_file')){
                $fileName = time() . '.' . $request->file('report_file')->getClientOriginalExtension();
                $request->file('report_file')->storeAs('public/kinerja', $fileName);
            }

            //buat performancereportfile berdasarkan id performance report
            $reportFile = PerformanceReportFile::create([
                'performance_report_id' => $report->id,
                'photo' => $fileName
            ]);

            if ($reportFile) {
                return redirect()->route('laporan-kinerja.index');
            }else{
                return redirect()->back()->withErrors(["message" => "Gagal Membuat Report File"]);
            }
        }else{
            return redirect()->back()->withErrors(["message" => "Gagal Membuat Report"]);
        }

        

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
    public function destroy(string $id)
    {
        $data = PerformanceReport::findorfail($id);
        if ($data) {
            $file = PerformanceReportFile::where('performance_report_id', $data->id)->first();

            if ($file) {
                $path = storage_path().'/app/public/kinerja/'.$file->photo;
                if(File::exists($path)){
                    unlink($path);
                }
                $file->delete();
                $data->delete();

                return redirect()->route('laporan-kinerja.index');
            }
        }
    }
}
