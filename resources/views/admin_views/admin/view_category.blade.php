@extends('admin_layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">View Category</h1>
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
                            <td><a href="" class="btn btn-primary"><i class="fas fa-solid fa-pen-nib"></i></a>
                            <a href="" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
