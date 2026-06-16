<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {

    if (auth()->user()->role == 'admin') {

        $totalEmployees = \App\Models\User::where('role', 'employee')->count();

        $totalAdmins = \App\Models\User::where('role', 'admin')->count();

        $totalAttendance = \App\Models\Attendance::count();

    } else {

        $totalEmployees = 0;
        $totalAdmins = 0;

        $totalAttendance = \App\Models\Attendance::where(
            'user_id',
            auth()->id()
        )->count();
    }

    return view('dashboard', compact(
        'totalEmployees',
        'totalAdmins',
        'totalAttendance'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('attendances', AttendanceController::class);
    Route::resource('employees', EmployeeController::class);
});

require __DIR__.'/auth.php';