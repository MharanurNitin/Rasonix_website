@extends('admin_layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Jobs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Jobs</li>
        </ol>
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>

                </thead>
                <tbody>

                    @foreach($career as $cate_item)
                     <tr onclick="window.location='http://localhost:8000/admin/view-jobs/{{$cate_item->id}}';">

                        <td>{{$cate_item->id}}</td>
                        <td>{{$cate_item->title}}</td>
                        <td>
                            <img src="{{asset('document/jobs/'.$cate_item->document)}}" width="50px" height="50px" alt="">
                        </td>
                        {{-- <td>{{$item->stats=='1'?'Hidden':'Shown'}}</td> --}}

                        <td>
                            {{-- <a href="{{url('admin/edit-category/'.$item->id)}}"class="btn btn-success">Edit</a> --}}
                           {{Illuminate\Support\Str::limit($cate_item->description,15)}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{url('admin/edit-jobs/'.$cate_item->id)}}">Edit</a>
                            <a  class="btn btn-sm btn-danger" href="{{url('admin/delete-jobs/'.$cate_item->id)}}">Delete</a>
                            {{-- <a href="{{url('admin/delete-category/'.$item->id)}}"class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>

                    @endforeach

                </tbody>
              </table>
        </div>
    </div>


@endsection
