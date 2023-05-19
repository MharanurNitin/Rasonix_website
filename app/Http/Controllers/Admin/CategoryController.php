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
        $data = Category::paginate(10);
        return view('admin_views.admin.view_category', ['data' => $data]);
    }
    public function edit($id)
    {
        $category = Category::find($id);
        // $category = $category->name;
        return view('admin_views.admin.edit_category', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        session()->flash('message', 'category updated successfully');
        return redirect('admin/view-category');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flas('message', 'category deleted successfully');
        return redirect()->back();
    }
}
