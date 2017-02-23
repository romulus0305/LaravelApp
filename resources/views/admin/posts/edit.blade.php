@extends('layouts.admin')










@section('content')


<h2>Edit Post</h2>

<div class="row">

{!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true]) !!}

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


{!!Form::submit('Create Post',['class'=>'btn btn-primary form-control']) !!}

</div>

</div>


@include('includes.formError')



@stop