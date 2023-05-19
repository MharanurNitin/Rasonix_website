@extends('admin_layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Category</h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ url('admin/edit-category/' . $category->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name='name' class="form-control" value="{{ $category->name }}">
                    </div>
                    <button class="btn btn-lg btn-primary" type='submit'>Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
