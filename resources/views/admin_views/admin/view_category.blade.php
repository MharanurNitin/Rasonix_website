@extends('admin_layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">View Category</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">View Category</li>
        </ol>
        <div class="row">
            <table class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action's</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ url('admin/edit-category/' . $item->id) }}" class="btn btn-primary"><i
                                        class="fas fa-solid fa-pen-nib"></i></a>
                                <a href="{{ url('admin/delete-category/' . $item->id) }}" class="btn btn-danger"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="your-paginate mt-4 d-flex align-center">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
