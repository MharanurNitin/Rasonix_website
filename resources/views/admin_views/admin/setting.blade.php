@extends('admin_layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Change Password</h4>
            </div>
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">
                   {{session('message')}}
                </div>
                @endif
                <form action="/admin/update-password" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="exampleInputEmail1">Old Password</label>
                      <input type="text" name='old_password' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Old Password" >
                      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                      @if ($errors->any('old_password'))
                        <span class="text-danger">{{$errors->first('old_password')}}</span>
                      @endif
                    </div>
                    <div class="form-group mb-3">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" name='new_password' class="form-control" id="exampleInputPassword1" placeholder="Password" >
                      @if ($errors->any('old_password'))
                        <span class="text-danger">{{$errors->first('new_password')}}</span>
                      @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1"> Confirm Password</label>
                        <input type="password" name='confirm_password' class="form-control" id="exampleInputPassword1" placeholder="Password" >
                        @if ($errors->any('old_password'))
                        <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                      @endif
                      </div>
                    {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
