@extends('admin_layouts.master')
@section('content')
<div class="container">

  <h2>All Contacts</h2>
   @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>phone</th>
        <th>Company</th>
        <th>Message</th>
        <th>Replied</th>
        <th>Reply</th>
        <th>Add Reply</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact )
      <tr>
        <td>{{$contact->name}}</td>
        <td>{{$contact->business_email}}</td>
        <td>{{$contact->phone_number}}</td>
         <td>{{$contact->company_name}}</td>
        <td>{{$contact->message}}</td>
        <td>{{$contact->replied}}</td>
        <td>{{$contact->reply}}</td>
        <td><a href="/admin/contact/reply/{{$contact->id}}" class="btn btn-primary text-white p-2">Reply</a></td>
        <td><a href="/admin/contact/delete/{{$contact->id}}" class="btn btn-danger text-white p-2">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection
