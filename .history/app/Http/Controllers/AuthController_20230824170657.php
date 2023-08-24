<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        dd($request->all());
        $request->validate([
            'nip' => 'required|unique:employees,nip',
            'nama' => 'required',
            'password' => 'required|min:6',
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
}
