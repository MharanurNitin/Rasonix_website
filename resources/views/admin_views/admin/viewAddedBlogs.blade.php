@extends('admin_layouts.master')
@section('content')
<div class="container">
  <h2>All Blogs</h2>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>description</th>
        <th>Image</th>
        <th>Thumbnail</th>
        <th>Status</th>
        <th>tags</th>
        <th>meta_title</th>
        <th>Meta_description</th>
        <th>Meta_keywords</th>
        <th>Edit</th>
        <th>Delete<th>
      </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
      <tr>
       <td>{{$blog->title}}</td>
       <td>{{$blog->slug}}</td>
       <td>{{$blog->description}}</td>
       <td><img src="{{$blog->image}}"/></td>
       <td><img src="{{$blog->thumbnail_image}}"/></td>
       <td>{{$blog->tag}}</td>
       <td>{{$blog->meta_title}}</td>
       <td>{{$blog->meta_description}}</td>
       <td>{{$blog->meta_keyword}}</td>
       <td><button class="btn btn-warning">Edit</button></td>
       <td><button class="btn btn-danger">Delete</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection