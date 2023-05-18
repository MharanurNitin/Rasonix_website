<?php

namespace App\Http\Controllers;


use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $current_user=session('password');

        if(Hash::check($request->old_password,$current_user)){

            // $current_user->update([
            //     'password'=>Hash::make($request->new_password)
            // ]);
            $users = User::find(session('id'));
            $users->password = bcrypt($request->new_password);
            $users->save();
            // return redirect()->back()->with('success','password successfully updated.');
            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        }else{
            // return redirect()->back()->with('error','old password does not matched.');
             session()->flash('message','Old  Password Does Not Matched');
             return redirect()->back();
        }
    }
}
