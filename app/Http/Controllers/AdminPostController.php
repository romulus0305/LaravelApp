<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;


use App\Photo;
use App\User;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          

        $posts = Post::all();
       return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $input = $request->all();
        $user = Auth::user();
        // $input['user_id'] = $user->id;

       if ($file = $request->file('photo_id')) {
           $name = time() . $file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['path'=>$name]);
           $input['photo_id'] = $photo->id;
        }
        else
        {
            $photo = Photo::create(['path'=>'post.png']);
            $input['photo_id'] = $photo->id;   
        }

//Cuva u posts tabeli i upisuje user_id  
$user->posts()->create($input);

return redirect('admin/posts');


    }









    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::lists('name','id')->all();
        $post = Post::findOrFail($id);

       return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {

        $input = $request->all();
        $post = Post::findOrFail($id);
      

                //Da li ima fotke sa forme?
             if ($file = $request->file('photo_id')) {
                    //da li ima fotke u bazi?
                    if($post->photo)
                    {
                        
                        $photoId =  $post->photo->id;
                        unlink(public_path().$post->photo->path);
                        $name = time() . $file->getClientOriginalName();
                        $file->move('images',$name);
                    // $photo = Photo::create(['path'=>$name]);
                        $photo = Photo::whereId($photoId)->update(['path'=>$name]);
                        $input['photo_id'] = $photoId;
        // return $input;
                    }    
                    else
                    {
                        $name = time() . $file->getClientOriginalName();
                        $file->move('images',$name);
                        $photo = Photo::create(['path'=>$name]);
                        // $photo = Photo::whereId($photoId)->update(['path'=>$name]);
                        $input['photo_id'] = $photo->id;
                    }


                }

        
        //     //da samo ulogovani korisnik moze da edituje SVOJE postove 
           $post =  Auth::user()->posts()->whereId($id)->first();


        //     //Brise staru fotku iz foldera images i postavlja novu pri apdejtu
        //    //imena starih fotki ostaju u tabeli photos
        //     if($post->photo){
        //     unlink(public_path().$post->photo->path);
        //     }

        //     //Ove moze ko hoces da edituje sve postove MOJ KOD
            $post->update($input);
            return redirect('admin/posts');
         



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $post = Post::findOrFail($id);

        if ($post->photo){

            if ($post->photo->path =='/images/post.png') {
                $post->photo->delete();
               
            }
            else
            {
                unlink(public_path().$post->photo->path);
                $post->photo->delete();
            } 

        }
       $post->delete();
       return redirect('admin/posts');

    }





        //Ova metoda nije u middlewaru
        public function post($id)
        {
           
             // $categories = Category::pluck('name','id')->all();

            $post = Post::findOrFail($id);
            $categories = Category::get(['id','name']);
            $comments = $post ->comments()->whereIsActive(1)->orderBy('created_at','desc')->get();
          
            
            return view('post',compact('post','categories','comments'));

  
        }






            public function category($id)
            {
               


               $categoryPost = Post::whereCategoryId($id)->get();


                    foreach ( $categoryPost as $post) {
                      

                        echo $post->title ."<br>";




                    }


            }





















}//Controller
