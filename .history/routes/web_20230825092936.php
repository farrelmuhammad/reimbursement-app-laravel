<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Home;
use Illuminate\Support\Facades\Route;

Route::get("/", Login::class)->name('login');
Route::get("/register", Register::class)->name('register');

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get("/home", Home::class)->name('home');
    // Tambahan: Rute logout
    Route::post("/logout", function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
});
