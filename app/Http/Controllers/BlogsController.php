<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    //
    public function index()
    {
        return view('admin_views.admin.blog');
    }
    public function store(Request $request)
    {
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

        $blogs = Blog::all();
        return redirect()->with(['messages' => "Blog successfully created", 'blogs' => $blogs]);
    }
    public function viewBlog()
    {
        return view('admin_views.admin.viewAddedBlogs');
    }
}
