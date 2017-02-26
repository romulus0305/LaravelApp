@extends('layouts.admin')












@section('content')

<h1>Media</h1>

<table class="table">
    <thead>
      <tr>

        <th>Id</th>
        <th>Photo</th>
        <th>File path</th>
        <th>Created</th>
      </tr>
    </thead>
    @if ($photos)
    <tbody>
   @foreach ($photos as $photo)
   	
    <tr>
        <td> {{ $photo->id }} </td>
        <td> <img src="{{ $photo->path }}" alt="photo" width="100px"> </td>
        <td>{{ $photo->path }}</td>
        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'No info'  }}</td>
    </tr>

       @endforeach
    </tbody>
    @endif

  </table>

@stop