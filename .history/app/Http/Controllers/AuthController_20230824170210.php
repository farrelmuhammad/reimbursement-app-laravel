<?php

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

public function register(Request $request)
{
    $request->validate([
        'nip' => 'required|unique:employees,nip',
        'nama' => 'required',
        'jabatan' => 'required',
        'password' => 'required|confirmed|min:6',
    ]);

    $employee = Employee::create([
        'nip' => $request->nip,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
    ]);

    User::create([
        'name' => $request->nama,
        'nip' => $request->nip,
        'password' => Hash::make($request->password),
        'employee_id' => $employee->id,
    ]);

    return redirect()->route('login');

    // Redirect to login or perform other actions
}
