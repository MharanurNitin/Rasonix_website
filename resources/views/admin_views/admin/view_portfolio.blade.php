@extends('admin_layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">View / Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Portfolio</li>
        </ol>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image URL</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                    <tr>
                        <td>{{ $portfolio->id }}</td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->description }}</td>
                        <td>{{ $portfolio->image_url }}</td>
                        <td>{{ $portfolio->status }}</td>
                        <td>
                            <a href="{{ url('admin/edit-portfolio', $portfolio->id) }}" class="btn btn-primary"><i
                                    class="fas fa-solid fa-pen-nib"></i></a>
                            <a href="{{ url('admin/delete-portfolio/' . $portfolio->id) }}" class="btn btn-danger"><i
                                    class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="your-paginate mt-4 d-flex align-center">
            {{ $portfolios->links() }}
        </div>
    </div>
@endsection
