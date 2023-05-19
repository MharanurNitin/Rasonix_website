@extends('admin_layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Portfolio</li>
        </ol>
        {{-- <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <form action="/admin/update-portfolio/{{$portfolio->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $portfolio->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $portfolio->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $portfolio->image_url }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="visible" {{ $portfolio->status === 'visible' ? 'selected' : '' }}>Visible</option>
                    <option value="hidden" {{ $portfolio->status === 'hidden' ? 'selected' : '' }}>Hidden</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Portfolio</button>
        </form>

    </div>
@endsection
