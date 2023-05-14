<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\AdminMiddleware;

class DashboardController extends Controller
{
    // public function __construct(){ $this->middleware(AdminMiddleware::class);}
    public function index (Request $request)
    {
      return $user = User::where('email','=',$request->email)->first();

        if($user)
        {
        //    $user->password '=' Hash::check($request->password)

        if (Hash::check($request->get('password'), $user->password)) {
         if($user->role === 'admin' )
         {

             return view('admin_views.admin.dashboard');
         }
         else
         {
            return redirect()->back();
         }
        } else {
            return redirect()->back()->withErrors(['error' => ['Invalid Password']]);
        }

        }
        else
        {
            return redirect()->back()->withErrors(['error' => ['Account Does Not Exist']]);
        }
    }
}
