<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InactiveUserController;

Route::get('/',[InactiveUserController::class,'inactiveUser'])->name('dashboard');
Route::get('settings',[InactiveUserController::class,'settings'])->name('settings');
Route::post('settings',[InactiveUserController::class,'settings_store'])->name('settings.store');
