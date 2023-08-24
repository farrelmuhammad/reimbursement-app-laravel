<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/login", Login::class)->name('login');
Route::get("/register", RegisterP1::class)->name('register-step-1');
Route::get("/home", Home::class)->name('home');


