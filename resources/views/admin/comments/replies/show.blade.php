@extends('layouts.admin')




  @section('content')


@if(count($replies)>0)





  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>reply</th>
        <th>Author</th>
        <th>Email</th>




      </tr>
    </thead>
    


    @foreach ($replies as $reply)

    <tbody>
      <tr>
        <td>{{$reply->id}} </td>
        <td>{{$reply->body}}</td>
        <td>{{$reply->author}}</td>
        <td>{{$reply->email}}</td>
        <!-- $reply = Comment::findOrFail($id)->replies, comment je metoda u modelu CommentReply i tada dobijam comment model koji ima metodu post u sebi i izvlacim id tog posta  -->
        <td> <a class="btn btn-info" href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
        
        <td>

          @if ($reply->is_active == 1)



          {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}


          <input type="hidden" name="is_active" value="0">

          <div class="form-group">


            {!!Form::submit('Disapprove',['class'=>'btn btn-warning']) !!}

          </div>

          {!!Form::close() !!}


          @else


          {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}


          <input type="hidden" name="is_active" value="1">

          <div class="form-group">


            {!!Form::submit('Approve',['class'=>'btn btn-success'])!!}

          </div>

          {!!Form::close()!!}



          @endif
        </td>
        <td>


          {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!} {{-- Delete Forma --}}

          <div class="form-group">
            {!!Form::submit('Delete',['class'=>'btn btn-danger']) !!}
          </div>

          {!! Form::close() !!}   {{-- Delete Forma --}}
        </td>
      </tr>
    </tbody>

    @endforeach
    
    @else

    <div class="col-sm-12 text-center">
    <h1>No replys</h1>
    </div>
    
    @endif

  </table>



  @stop