	@extends('layouts.admin')




	@section('content')


@if(count($comment)>0)





	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>Comment</th>
				<th>Author</th>
				<th>Email</th>




			</tr>
		</thead>
		


		@foreach ($comment as $comment)

		<tbody>
			<tr>
				<td>{{$comment->id}} </td>
				<td>{{$comment->body}}</td>
				<td>{{$comment->author}}</td>
				<td>{{$comment->email}}</td>
				<td> <a class="btn btn-info" href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
				<td> <a class="btn btn-info" href="{{route('admin.comment.replies.show',$comment->id)}}">View Reply</a></td> 
				<td>
				
					@if ($comment->is_active == 1)



					{!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}


					<input type="hidden" name="is_active" value="0">

					<div class="form-group">


						{!!Form::submit('Disapprove',['class'=>'btn btn-warning']) !!}

					</div>

					{!!Form::close() !!}


					@else


					{!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}


					<input type="hidden" name="is_active" value="1">

					<div class="form-group">


						{!!Form::submit('Approve',['class'=>'btn btn-success'])!!}

					</div>

					{!!Form::close()!!}



					@endif
				</td>
				
				<td>


					{!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!} {{-- Delete Forma --}}

					<div class="form-group">
						{!!Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					</div>

					{!! Form::close() !!} 	{{-- Delete Forma --}}
				</td>
			</tr>
		</tbody>

		@endforeach
		
		@else

		<div class="col-sm-12 text-center">
		<h1>No Comments</h1>
		</div>
		
		@endif

	</table>



	@stop