<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
  public function store(Request $request)
  {
    //$data = $request;
    //return $data;
    $data = new Category;
    $data->name = Str::upper($request['name']);
    //$data->created_by = Auth::User()->id;
    $data->save();
    return redirect('admin/create-category')->with('message', 'Category added successfully');
  }
  public function create()
  {
    return view('admin_views.admin.category');
  }
  public function view_category()
  {
    $data = Category::all();
    return view('admin_views.admin.view_category', ['data' => $data]);
  }
}
