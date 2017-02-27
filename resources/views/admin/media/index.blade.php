@extends('layouts.admin')












@section('content')

<h1>Media</h1>

<table class="table">
    <thead>
      <tr>

        <th>Id</th>
        <th>Photo</th>
        <th>File path</th>
        <th>Used By</th>
     
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
        <td>{{ 

          //Sa ovim sam se jebao 2 dana
          //Ako Post ima fotku prikazuje fotku vezanu za taj post ili ako juzer ima fotku pokazuje fotku za juzera ako ne no Info
          ($photo->user['name'] ? $photo->user['name'] : $photo->post['title']) ? ($photo->user['name'] ? $photo->user['name'] : $photo->post['title']) : 'Not in use'  

        }}</td>
        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'No info'  }}</td>
        
        <td> {{-- delete dugme --}}
          
          
        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!} {{-- Delete Forma --}}

          <div class="form-group">
            {!!Form::submit('Delete',['class'=>'btn btn-danger']) !!}
          </div>

        {!! Form::close() !!}   {{-- Delete Forma --}}


        </td>
    </tr>

       @endforeach
    </tbody>
    @endif

  </table>




@stop




