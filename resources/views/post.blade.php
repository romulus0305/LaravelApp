@extends('layouts.blog-post')




@section('category')
    

    
@include('includes.cat')


@stop



@section('content')
<!-- Blog Post -->

                <!-- Title -->
                <h1> {{$post->title}} </h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"> {{$post->user->name}} </a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted at: {{ $post->created_at->toRfc850String()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src=" {{$post->photo->path}} "  width="300px" alt="photo">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>
                <p> {{$post->body}} </p>

                <hr>
@if (Session::has('comment_msg'))
   {{session('comment_msg')}}
@endif
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>








{!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}


<input type="hidden" name="post_id" value="{{$post->id}}">

<div class="form-group">

{!!Form::textarea('body',null,['class'=>'form-control']) !!}

</div>


<div class="form-group">

{!!Form::submit('Comment',['class'=>'btn btn-primary form-control']) !!}

</div>

{!! Form::close() !!}









                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>






@stop