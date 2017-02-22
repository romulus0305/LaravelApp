@extends('layouts.admin')





@section('content')
	<h2>Posts</h2>
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Owner</th>
        <th>Category</th>
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
      <td><img height="70px" src="{{$post->photo['path'] ? $post->photo['path'] : 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97150&w=150&h=150' }}"></td>
        <td>{{$post->user['name']}}</td>
        <td>{{$post->category['name'] ? $post->category['name'] : 'No Category' }}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>

@endforeach

@endif
    </tbody>
  </table>

@stop