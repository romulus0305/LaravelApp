@extends('layouts.admin')







@section('content')


<h2>Categories</h2>


<div class="row">

<div class="col-sm-6">
	


{!! Form::open(['method'=>'POST','action'=>'AdminCategoryController@store']) !!}

<div class="form-group">

{!! Form::label('name','Name:')!!}
{!!Form::text('name',null,['class'=>'form-control']) !!}

</div>

<div class="form-group">


{!!Form::submit('Create Category',['class'=>'btn btn-primary form-control']) !!}

</div>




</div>




<div class="col-sm-6">
	
@if ($categories)




<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>

@foreach ($categories as $category)
	

     <tr>
        <td> {{$category->id}} </td>
        <td><a href="{{ route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Info'}} </td>
      </tr>
      
@endforeach


    </tbody>
  </table>


@endif

</div>
</div>

<div class="row">
@include('includes.formError')
</div>

@stop