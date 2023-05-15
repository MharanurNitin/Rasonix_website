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
    public function index(Request $request)
    {
        return view('admin_views.admin.dashboard');
    }
}
