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

                    @foreach ($career as $cate_item)
                        <tr>

                            <td>{{ $cate_item->id }}</td>
                            <td>{{ $cate_item->title }}</td>
                            <td>
                                <img src="{{ asset('document/jobs/' . $cate_item->document) }}" width="50px" height="50px"
                                    alt="">
                            </td>
                            <td>
                                {{ Illuminate\Support\Str::limit($cate_item->description, 15) }}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('admin/edit-jobs/' . $cate_item->id) }}"><i
                                        class="fas fa-solid fa-pen-nib"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{ url('admin/delete-jobs/' . $cate_item->id) }}"><i
                                        class="fa-regular fa-trash-can"></i></a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="your-paginate mt-4 d-flex align-center">
                {{ $career->links() }}
            </div>
        </div>
    </div>
@endsection
