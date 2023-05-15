@extends('admin_layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category</h4>
            </div>
            <div class="card-body">
                <form action="{{url('dashboard/create')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name='title' class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name='slug' class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <input type="text" name='description' class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name='image' class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Thumbnail</label>
                        <input type="text" name='thumbnail_image' class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Status</label>
                       <select name="status" id="">
                        <option value="">Show</option>
                        <option value="">Hide</option>
                       </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Tags</label>
                        <textarea name="tags" id="" cols="160" rows="3"></textarea>
                    </div>
                    <button class="btn btn-lg btn-primary" type='submit'>Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
