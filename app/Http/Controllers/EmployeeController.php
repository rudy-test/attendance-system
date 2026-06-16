<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'employee') {

            $employees = User::where(
                'id',
                auth()->id()
            )->get();

        } else {

            $employees = User::all();

        }

        return view('employees.index', compact('employees'));
    }



    public function create()
    {
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }

        return view('employees.create');
    }


    public function store(Request $request)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/employees');
    }

    public function edit(string $id)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }

        $employee = User::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }



    public function update(Request $request, string $id)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }

        $employee = User::findOrFail($id);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect('/employees')->with('success', 'Employee updated');
    }

    public function destroy(string $id)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $employee = User::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted');
    }
}