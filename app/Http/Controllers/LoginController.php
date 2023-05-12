<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
     return view('form.login');
    }
    public function login(Request $request)
    {
        $user= User::where(['email'=>$request->email])->first();
        if(!$user($request->password,$user->password))
        {
            return 'password not matched';
        }
        else
        {
            $request->session()->put('user',$user);
            return redirect('admin/dashboard');
        }
    }
}
