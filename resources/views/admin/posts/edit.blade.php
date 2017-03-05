@extends('layouts.admin')










@section('content')


<h2>Edit Post</h2>




<div class="col-sm-3">
		
<img class="img-responsive img-rounded" src="{{$post->photo['path']}}" alt="photo">
</div>




<div class="row">

<div class="col-sm-9">

{!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true]) !!} {{-- Edit Forma --}}

<div class="form-group">

{!! Form::label('title','Title:')!!}
{!!Form::text('title',null,['class'=>'form-control']) !!}

</div>

<div class="form-group">

{!! Form::label('category','Category:')!!}
{!!Form::select('category_id',$categories, null ,['class'=>'form-control']) !!}

</div>

<div class="form-group">

{!! Form::label('file','File:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control']) !!}

</div>


<div class="form-group">

{!! Form::label('body','Text:')!!}
{!!Form::textarea('body',null,['class'=>'form-control']) !!}

</div>




<div class="form-group">
{!!Form::submit('submit',['class'=>'btn btn-primary col-sm-6']) !!}
</div>

{!! Form::close() !!} 	{{--  / Edit Forma --}}





{!! Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id]]) !!} {{-- Delete Forma --}}

<div class="form-group">
	{!!Form::submit('Delete',['class'=>'btn btn-danger  col-sm-6']) !!}
</div>

{!! Form::close() !!} 	{{-- Delete Forma --}}




</div> {{-- col-sm-9 --}}

</div> {{-- row --}}


<div class="row">

@include('includes.formError') {{-- show errors --}}

</div>

@stop