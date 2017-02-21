@extends('layouts.admin')







@section('content')

<h2>Edit User</h2>
<hr>


<div class="col-sm-3">
		
<img class="img-responsive img-rounded" src="{{$user->photo['path'] ? $user->photo['path'] : '/images/default.png'}}" alt="photo">


</div>


<div class="row">

<div class="col-sm-9">

{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

<div class="form-group">

{!! Form::label('name','Name')!!}
{!!Form::text('name',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">


{!! Form::label('email','Email')!!}
{!!Form::Email('email',null,['class'=>'form-control']) !!}


</div>
<div class="form-group">

{!! Form::label('password','Password')!!}
{!!Form::password('password',['class'=>'form-control']) !!}

</div>
<div class="form-group">

{!! Form::label('file','File')!!}
{!!Form::file('photo_id',['class'=>'form-control']) !!}

</div>


<div class="form-group">

{!! Form::label('is_active','Status')!!}
{!!Form::select('is_active',array(1 =>'Active',0=>'Not active'),null,['class'=>'form-control']) !!}

</div>
<div class="form-group">

{!! Form::label('role_id','Role')!!}

{!!Form::select('role_id',$roles,null,['class'=>'form-control']) !!}

</div>



<div class="form-group">
{!!Form::submit('submit',['class'=>'btn btn-primary  col-sm-6']) !!}
</div>


{!! Form::close() !!}



{!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}



<div class="form-group">
	{!!Form::submit('Delete',['class'=>'btn btn-danger  col-sm-6']) !!}
</div>

{!! Form::close() !!}






</div>


</div> {{-- form div row--}}


<div class="row">
	
@include('includes.formError')


</div>





@stop


