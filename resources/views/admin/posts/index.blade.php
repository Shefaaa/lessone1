@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

@if(Session::has('created_post'))

<div class="alert alert-success">

 <p>{{Session('created_post')}}</p>

</div>

@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th>Post Id</th>
        <th>Photo</th>
        <th>Tile</th>
        <th>Body</th>
        <th>User Name</th>
        <th>Category</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($posts)
    	@foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
         <td><img height="50" src="{{$post->photo_id?$post->photo->file : 'http://placehold.it/400x400'}}"></td>
        <td><a href="{{route('admin.posts.edit',$post->id)}}"> {{$post->title}} </a></td>
        <td>{{$post->body}}</td>
        <td>{{$post->user_id ? $post->user->name : '-'}}</td>
        <td>{{$post->category_id ? $post->category->name : 'Un Categorized'}}</td>
        <td>{{$post->created_at->diffforHumans()}}</td>
        <td>{{$post->updated_at->diffforHumans()}}</td>
      </tr>
        @endforeach
     @endif
    </tbody>
  </table>



@stop