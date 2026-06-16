<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'employee') {

            $attendances = Attendance::with('user')
                ->where('user_id', auth()->id())
                ->get();

        } else {

            $attendances = Attendance::with('user')->get();

        }

        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $employees = User::where('role', 'employee')->get();

        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'check_in' => 'required',
            'status' => 'required',
        ]);

        Attendance::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => $request->status,
        ]);

        return redirect('/attendances')
            ->with('success', 'Attendance created');
    }

    public function destroy(string $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $attendance = Attendance::findOrFail($id);

        $attendance->delete();

        return redirect('/attendances')
            ->with('success', 'Attendance deleted');
    }
}