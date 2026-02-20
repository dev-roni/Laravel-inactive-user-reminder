<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InactiveUserController;

Route::get('/',[InactiveUserController::class,'inactiveUser'])->name('inactive.user');
