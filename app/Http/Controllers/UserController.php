<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('form.login');
    }

    public function login(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();
        // $decrypt = Hash::check($user->password);
        if (!$user || !Hash::check($req->password, $user->password)) {
            session()->flash('message', 'please enter valid credential');
            return redirect()->back();
        } else {
            $req->session()->put(['id' => $user->id, 'name' => $user->name, 'role' => $user->role, 'password' => $user->password]);
            return redirect('admin/dashboard');
        }
    }
    public function allUsers()
    {
        return User::all();
    }
    public function add_user()
    {
        return view('admin_views.admin.add_user');
    }



    public function store_user(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required|in:guest,user,editor,admin,super_admin',
            'profile_image' => 'nullable|image',
            'joining_date' => 'nullable|date',
            'block_status' => 'boolean',
        ]);
        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);
        // Process the uploaded profile image if provided
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('public/profile_images');
            $validatedData['profile_image'] = $imagePath;
        }

        // Create the user
        $user = User::create($validatedData);

        // Redirect or return a response
        return redirect()->route('add-user')->with('success', 'User added successfully!');
    }


    public function view_user()
    {
        $users = User::all();
        return view('admin_views.admin.view_users', compact('users'));
    }



    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin_views.admin.edit_user', compact('user'));
    }



    public function update_user(Request $request, $id)
    {
        $user = User::find($id);

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_no' => 'required|unique:users,phone_no,' . $user->id,
            'role' => 'required|in:guest,user,editor,admin,super_admin',
            'profile_image' => 'nullable|image',
            'joining_date' => 'nullable|date',
            'block_status' => 'boolean',
        ]);

        // Process the uploaded profile image if provided
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('public/profile_images');
            $validatedData['profile_image'] = $imagePath;
        }

        // Update the user
        $user->update($validatedData);

        // Redirect or return a response
        return redirect()->route('view-users')->with('success', 'User updated successfully!');
    }


    public function destroy($id)
    {
        // Delete the User record
        $user = User::find($id);
        $user->delete();

        // Redirect or return a response
        return redirect()->route('view-users')->with('success', 'User deleted successfully!');
    }
}
