<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Employee;
use App\Http\Livewire\Dashboard\Finance;
use App\Http\Livewire\Dashboard\Home;
use Illuminate\Support\Facades\Route;

Route::get("/", Login::class)->name('login');
Route::get("/register", Register::class)->name('register');

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get("/home", Home::class)->name('home');
    Route::get("/employee", Employee::class)->name('employee');
    Route::get("/finance", Finance::class)->name('finance');
    // Tambahan: Rute logout
    Route::post("/logout", function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
});
