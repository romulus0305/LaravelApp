@extends('layouts.admin')












@section('content')

<h2>Edit Category</h2>

<div class="row">
<div class="col-sm-6 ">
	


{!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id]]) !!} {{-- Edit Forma --}}

<div class="form-group">

{!! Form::label('name','Name:')!!}
{!!Form::text('name',null,['class'=>'form-control']) !!}

</div>

<div class="form-group">


{!!Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}

</div>




{!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$category->id]]) !!} {{-- Delete Forma --}}

<div class="form-group">
	{!!Form::submit('Delete',['class'=>'btn btn-danger  col-sm-6']) !!}
</div>

{!! Form::close() !!} 	{{-- Delete Forma --}}




</div>
</div>

 

@stop


