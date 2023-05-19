@extends('admin_layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add User</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <form method="POST" action="/admin/add-user">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                    @if ($errors->any('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" >
                    @if ($errors->any('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                  @endif
                </div>

                <div class="mb-3">
                    <label for="phone_no" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="">
                    @error('phone_no')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- <div class="mb-3" style="width: 100%">
                    <label  for="phone_no" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone_no" placeholder="">
                    @error('phone_no')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <span  id="valid-msg" class="hide">✓ Valid</span>
                    <span  id="error-msg" class="hide"></span>
                </div> --}}

                {{-- <div class="mb-3" style="width: 100%">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input id="phone" type="tel" class="form-control" name="phone_no" style="width:90%">
                    <br>
                    <span id="valid-msg" class="hide">✓ Valid</span>
                    <span id="error-msg" class="hide"></span>
                </div> --}}

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" id="role" name="role" >
                        <option value="guest">Guest</option>
                        <option value="user">User</option>
                        <option value="editor">Editor</option>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                    @error('role')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="profile_image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    @error('profile_image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="joining_date" class="form-label">Joining Date</label>
                    <input type="date" class="form-control" id="joining_date" name="joining_date">
                    @error('joining_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="block_status" name="block_status">
                    <label class="form-check-label" for="block_status">Block Status</label>
                    @error('block_status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div> --}}

                <button type="submit" class="btn btn-primary btn-block">Add User</button>
            </form>


        </div>
    </div>
</div>
@endsection
