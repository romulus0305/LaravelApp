@extends('layouts.admin')





@section('content')
	<h2>Posts</h2>
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Text</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
@if (count($posts)>0)
 
   	@foreach ($posts as $post)
   		
   	
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->user_id}}</td>
        <td>{{$post->category_id}}</td>
        <td>{{$post->photo_id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
      </tr>

@endforeach

@endif
    </tbody>
  </table>

@stop