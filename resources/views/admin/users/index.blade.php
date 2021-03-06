@extends('layouts.admin')


@section('content')



<h1>Users</h1>

@if(Session::has('added_user'))
<div class="alert alert-success">
<p>{{Session('added_user')}}</p>
</div>

@endif

@if(Session::has('updated_user'))
<div class="alert alert-success">
<p>{{Session('updated_user')}}</p>
</div>

@endif

@if(Session::has('deleted_user'))
<div class="alert alert-danger">
<p>{{Session('deleted_user')}}</p>
</div>

@endif

<table class="table table-striped">
    <thead>
      <tr>
        <th>User Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Active</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($users)
    	@foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="50" src="{{$user->photo_id? $user->photo->file : 'http://placehold.it/400x400'}}"></td>
        <td><a href="{{route('admin.users.edit',$user->id)}}"> {{$user->name}} </a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffforHumans()}}</td>
        <td>{{$user->updated_at->diffforHumans()}}</td>
      </tr>
        @endforeach
     @endif
    </tbody>
  </table>

@stop