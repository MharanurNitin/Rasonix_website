<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('admin_views.admin.blog', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required|min:15',
            'image' => 'mimes:png,jpg,jpeg',
            'thumbnail_image' => 'mimes:png,jpg,jpeg',
        ]);
        $blog = new Blog();
        $blog->category_id = (int)$request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug);
        $blog->description = $request->description;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('document/blog/', $filename);
            $blog->image = $filename;
        }

        if ($request->hasfile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('document/blog/', $filename);

            $blog->thumbnail_image = $filename;
        }
        $blog->tags = $request->tags;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->save();


        return redirect('/admin/view-blog')->with('messages', "Blog successfully created");
    }
    public function viewBlog()
    {
        $blogs = Blog::all();

        return view('admin_views.admin.viewAddedBlogs', compact('blogs'));
    }
    public function edit($id)
    {
        $categories = Category::all();
        $blog = Blog::find($id);
        $blogid = $blog->id;
        return view('admin_views.admin.editblog', compact('blog', 'blogid', 'categories'));
    }
    public function editsubmit(Request $request, $id)
    {

        $blog = Blog::find($id);
        $blog->category_id = (int)$request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug);
        $blog->description = $request->description;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('document/blog/', $filename);
            $blog->image = $filename;
        }

        if ($request->hasfile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('document/blog/', $filename);

            $blog->thumbnail_image = $filename;
        }
        $blog->tags = $request->tags;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->save();


        return redirect('/admin/view-blog')->with('messages', "Blog successfully updated");
    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back();
    }
}
