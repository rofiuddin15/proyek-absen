<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShiftGrupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ShiftPresenceController;
use App\Http\Controllers\CategoryPermitController;
use App\Http\Controllers\EmployeePermitsController;
use App\Http\Controllers\PerformanceReportController;
use App\Http\Controllers\PresenceReportController;


Route::group(['middleware' => 'guest'], function(){
    Route::get("/login", function(){
        return view('auth.login');
    })->name('login');
    
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
});

Route::group(['middleware' => 'auth'], function(){
    Route::get("/", [DashboardController::class,"index"])->name("dashboard");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('kategori-izin', CategoryPermitController::class);
    Route::resource('izin-karyawan', EmployeePermitsController::class);
    Route::resource('shift-grup', ShiftGrupController::class);
    Route::resource('shift-absen', ShiftPresenceController::class);
    Route::resource('presensi', PresenceController::class);
    Route::resource('karyawan', UserProfileController::class);
    Route::get('/profil', [UserProfileController::class, 'show'])->name('profil.show');
    Route::resource('laporan-kinerja', PerformanceReportController::class)->only('index', 'destroy', 'create', 'store');
    Route::resource('presensi-rekap', PresenceReportController::class);
});
