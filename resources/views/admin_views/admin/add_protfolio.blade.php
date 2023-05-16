@extends('admin_layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Portfolio</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/create-category')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Protfolio Name</label>
                    <input type="text" name='title' class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <input type="text" name='description' class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Image URL</label>
                    <input type="file" name='image_url' class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name='status' class="form-control">
                </div>

                <button class="btn btn-lg btn-primary" type='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
