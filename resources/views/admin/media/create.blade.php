@extends('layouts.admin')




@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@stop







@section('content')







<h2>Upload File </h2>




<div class="row">
	<div class="col-sm-6">

		{!! Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'dropzone','file'=>true]) !!}

		{!!Form::close()!!}

	</div>
</div>






@stop


@section('footer')
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop