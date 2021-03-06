@extends('layouts.admin')







@section('content')

<h2>Create User</h2>
<hr>



{!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}

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
{!!Form::select('is_active',array(1 =>'Active',0=>'Not active'), 0 ,['class'=>'form-control']) !!}

</div>
<div class="form-group">

{!! Form::label('role_id','Role')!!}
{{-- [''=>'Choose Options'] + $roles konkatinacija niza $roles sa postojecim nizom --}}
{!!Form::select('role_id',[''=>'Choose Options'] + $roles,null,['class'=>'form-control']) !!}

</div>

<div class="form-group">


{!!Form::submit('submit',['class'=>'btn btn-primary form-control']) !!}

</div>

{!! Form::close() !!}



@include('includes.formError')



@stop


