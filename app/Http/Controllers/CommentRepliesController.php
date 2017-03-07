<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\CommentReply;
use App\Comment;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        








    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }











    public function createReply(Request $request)
    {
       

        $user = Auth::user();
      
        $data =
        [

            'comment_id'=>$request->comment_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'photo'=>$user->photo->path,
            'body'=>$request->body

        ];

        CommentReply::create($data);

        // Flash poruka pri pravljenju reply-a
        $request->session()->flash('reply_msg','Reply message has been submited and is waitnig moderation');

        return redirect()->back();

    }

















    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Vadi replike za svaki komentar uz pomoc metode iz modela Comment    
        $replies = Comment::findOrFail($id)->replies;
        return view('admin.comments.replies.show',compact('replies'));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $reply = CommentReply::findOrFail($id);
        $reply->update($request->all());
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = CommentReply::findOrFail($id)->delete();
        return redirect()->back();
    }
}
