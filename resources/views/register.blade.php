@extends('layouts.master')
@section('name')
    <div class="form-container">
        <h1>Register form</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_img" id="">
            <input type="text" name="username" id="">
            <input type="text" name="email" id="">
            <input type="password" name="password">
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
