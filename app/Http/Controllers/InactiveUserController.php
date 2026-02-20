<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class InactiveUserController extends Controller
{
    public function inactiveUser(){
        $inactiveUser = User::inactive()->get();
        return $inactiveUser;
    }
}
