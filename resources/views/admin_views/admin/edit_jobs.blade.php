@extends('admin_layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit / Update Jobs</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/update-jobs/'.$career->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name='title' class="form-control" value="{{$career->title}}">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    {{-- <input type="text" name='name' class="form-control"> --}}
                    <textarea name="description" id="" cols="150" rows="5">{{$career->description}}</textarea>
                </div>



                <div class="mb-3">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="categories_id"  required>
                        <option value="" selected disabled>select a Category</option>
                        @foreach($categories as $category)
                            <option  value="{{ $category->name }}" @selected($category->id == $career->categories_id )>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Select Document</label>
                    <input type="file" accept=".pdf,.png,.jpg,.jpeg" name='document' class="form-control">
                </div>

                <button class="btn btn-lg btn-primary" type='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
