@extends('admin_layouts.master')

@section('content')
    <div class="container px-4">
        <h1 class="mt-4">Edit User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">User</li>
        </ol>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_no }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="/admin/edit-users/{{$user->id}}" style="text-decoration: none"
                                    class='btn btn-primary'> <i class="fas fa-solid fa-pen-nib"></i> </a>
                                <a href="/admin/delete-user/{{$user->id}}" class="btn btn-danger"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="your-paginate mt-4 d-flex align-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
