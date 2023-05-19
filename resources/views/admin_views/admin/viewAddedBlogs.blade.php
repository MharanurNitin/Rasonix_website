@extends('admin_layouts.master')
@section('content')
    <style>
        tbody:nth-child(2n+1) {
            background: rgba(0, 0, 0, 0.372)
        }
    </style>
    <div class="container mt-3 mb-2">
        <div class="d-flex justify-content-between">
            <h2>All Blogs</h2>
            <a href="/admin/add-blog" class="btn btn-success float-right">Add Blog</a>
        </div>
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Thumbnail</th>

                    <th>tags</th>
                    <th>meta_title</th>
                    <th>Meta_description</th>
                    <th>Meta_keywords</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete
                    <th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ Str::limit($blog->title, 25) }}</td>
                        <td>{{ Str::limit($blog->slug, 25) }}</td>
                        <td>{{ Str::limit($blog->description, 25) }}</td>
                        <td><img width="50px" height="50px" src="/document/blog/{{ $blog->image }}" /></td>
                        <td><img width="50px" height="50px" src="/document/blog/{{ $blog->thumbnail_image }}" />
                        </td>

                        <td>{{ Str::limit($blog->tags, 12) }}</td>
                        <td>{{ Str::limit($blog->meta_title, 25) }}</td>
                        <td>{{ Str::limit($blog->meta_description, 17) }}</td>
                        <td>{{ Str::limit($blog->meta_keyword, 15) }}</td>
                        <td>
                            @if ($blog->status == 'hidden')
                                <button class="btn btn-success">Show</button>
                            @else
                                <button class="btn btn-secondary">Hide</button>
                            @endif
                        </td>

                        <td><a class="btn btn-primary" href="/admin/blog/edit/{{ $blog->id }}"><i
                                    class="fas fa-solid fa-pen-nib"></i> </a></td>
                        <td><a class="btn btn-danger" href="/admin/blog/delete/{{ $blog->id }}"><i
                                    class="fa-regular fa-trash-can"></i></a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="your-paginate mt-4 d-flex align-center">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
