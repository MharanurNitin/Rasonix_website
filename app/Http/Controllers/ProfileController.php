<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function view_profile()
    {
        return view('admin_views.admin.setting');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password'=> 'required|min:8|max:16',
            'new_password'=>'required|min:8|max:16',
            'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();
        if(Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
                'password'=>Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('success','password successfully updated.');
        }else{
            return redirect()->back()->with('error','old password does not matched.');
        }
    }
}
