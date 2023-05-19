@extends('admin_layouts.master')
@section('content')
<div class="blog-form-container p-4">
    <h1 class="text-4xl font-semibold text-center">Edit Blog</h1>
    <form action='/admin/blog/edit/{{$blogid}}' method="post" class="" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <label for="title">Category_id</label>
      <select class="form-control" name="category_id">
      @foreach($categories as $category)
     <option value="{{$category->id}}" @selected($blog->category_id==$category->id)>{{$category->name}}</option>
      @endforeach
     </select>
       <label for="title">Title</label>
     <input type="text" name="title" class="form-control" value="{{$blog->title}}"/>
       <label for="slug">Slug</label>
     <input type="text" name="slug" class="form-control" value="{{$blog->slug}}"/>
     <label for="description">Description</label>
     <textarea name="description" class="form-control" id="textarea">{{$blog->description}}</textarea>
     <label for="image">Image</label>
     <input type="file" name="image"  accept=".png, .jpg, .jpeg, .pdf" class="form-control" />
       <label for="thumbnail_image">Thumbnail_image</label>
     <input type="file" name="thumbnail_image"  accept=".png, .jpg, .jpeg, .pdf"  class="form-control"/>
       <label for="tags">Tags</label>
     <input type="text" name="tags" class="form-control" placeholder="seperated by comma," value="{{$blog->tags}}"/>
       <label for="meta_title">Meta_title</label>
     <input type="text" name="meta_title" class="form-control" value="{{$blog->meta_title}}"/>
       <label for="meta_description">Meta_description</label>
     <input type="text" name="meta_description" class="form-control" value="{{$blog->meta_description}}"/>
      <label for="meta_keyword">meta_keyword</label>
     <input type="text" name="meta_keyword" class="form-control" value="{{$blog->meta_keyword}}"/>
     <button class="btn btn-primary px-3 py-2 text-white  mt-2  m-auto ">Submit</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#textarea").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endsection
