@extends('admin_layouts.master')
@section('content')
<div class="blog-form-container p-4">
    <h1 class="text-4xl font-semibold text-center">Add Blog</h1>
    <form action='{{url('admin/add-blog')}}' method="post" class="" enctype="multipart/form-data">
    @csrf
     <label for="title">Category_id</label>
     {{-- <input type="text" name="category_id" class="form-control"/> --}}
     <select class="form-control">
      @foreach($categories as $category)
     <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
     </select>
       <label for="title">Title</label>
     <input type="text" name="title" class="form-control"/>
       <label for="slug">Slug</label>
     <input type="text" name="slug" class="form-control"/>
     <label for="description">Description</label>
     <textarea name="description" class="form-control" id="textarea"></textarea>
     <label for="image">Image</label>
     <input type="file" name="image" class="form-control"/>
       <label for="thumbnail_image">Thumbnail_image</label>
     <input type="file" name="thumbnail_image" class="form-control"/>
       <label for="tags">Tags</label>
     <input type="text" name="tags" class="form-control" placeholder="seperated by comma,"/>
       <label for="meta_title">Meta_title</label>
     <input type="text" name="meta_title" class="form-control"/>
       <label for="meta_description">Meta_description</label>
     <input type="text" name="meta_description" class="form-control"/>
      <label for="meta_keyword">meta_keyword</label>
     <input type="text" name="meta_keyword" class="form-control"/>
     <button class="bg-blue-800 p-2 text-white text-xl mt-2 w-[120px] m-auto rounded">Submit</button>
    </form>
</div>

@endsection