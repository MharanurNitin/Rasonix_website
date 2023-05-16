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
            return 'username / password not matched';
        } else {
            $req->session()->put(['id'=>$user->id,'name' => $user->name, 'role' => $user->role]);
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
}
