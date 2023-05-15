<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        session()->forget('role');
        session()->forget('name');
        // User::logout();
        return redirect('/');
    }
}
