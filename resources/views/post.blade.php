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
                                @elseif(Session::has('reply_msg'))
                                 {{session('reply_msg')}}  
                                @endif
                                                <!-- Blog Comments -->

                                @if(Auth::check())
                                    



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
                                                <!--/ Comments Form -->
                                @endif
                                                <hr>
                               
            <!--                            Comments -->
                                @if (count($comments)>0)
                                    @foreach ($comments as $comment)       

                                                <!-- Comment -->
                                            <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="{{$comment->photo}}" height="64px" alt="user photo">
                                                    </a>
                                                <div class="media-body">
                                                        <h4 class="media-heading">{{$comment->author}}
                                                            <small> {{$comment->created_at->toCookieString()}} </small>
                                                        </h4>
                                                       {{$comment->body}} 
                                                    
                                                          {{--  <button class="btn btn-info pull-right">Reply</button> --}}

                                                  
                                                             {{-- replyForm --}}
                                                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}


                                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                            <div class="form-group">

                                                            {!!Form::textarea('body',null,['rows'=>1]) !!}

                                                            </div>


                                                            <div class="form-group">

                                                            {!!Form::submit('Reply',['class'=>'btn btn-success']) !!}

                                                            </div>

                                                            {!! Form::close() !!}
                                                                {{--/ end-ReplyForm --}}
                                               
                                                            {{-- Replies --}}
                                                            @if(count($comment->replies)>0)
                                                                @foreach ($comment->replies as $reply)  
                                                                    @if ($reply->is_active == 1)
                                                                                      
                                                                                                
                                                                               <!-- Nested Comment -->
                                                                                <div class="media">
                                                                                    <a class="pull-left" href="#">
                                                                                        <img class="media-object" src="{{$reply->photo}}"  height="64" alt="">
                                                                                    </a>
                                                                                    <div class="media-body">
                                                                                        <h4 class="media-heading">Nested Start Bootstrap
                                                                                            <small>August 25, 2014 at 9:30 PM</small>
                                                                                        </h4>
                                                                                        {{$reply->body}}
                                                                                    </div>
                                                                       
                                                                                </div> <!--/ Nested Comment  end-->
                                                                    @endif
                                                                @endforeach
                                                            @endif                   
                                                            {{--/  end-Replies --}}
                                                 
                                                </div> <!--/ end-MediaBody-->
                                            </div>  <!--/ end-Comment -->


                                          
                           
                                    @endforeach                     
                                 @endif                          
                                                     
                                                




                            

                                @stop



                                @section('scripts')
                                
                                @stop