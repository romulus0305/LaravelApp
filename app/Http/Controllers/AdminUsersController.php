<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
      // foreach ($users as $user) {
      //     return $user->role->name;
      // }

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //Koristi se za input role u formi    
         $roles = Role::lists('name','id')->all(); 
      
         //('name','id') mora ovim redom zato sto kada dodje do select kontrole bira se name a salje se id
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {


        //Nije potrebno ato sto u requestu imam rule za password al neka ga
        if (trim($request->password) == '') {
            $input = $request->except('password');
        }
        else
        {   
            $input = $request->all();
            $input['password'] = trim(bcrypt($request->password));

        }

       

        //Cuva fotku ako je ima
        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            //Cuvanje fotke u bazi u tabeli photos
            $photo = Photo::create(['path'=>$name]);
            //Dodavanje id novosacuvane fotke da bi ga sacuvao u tabeli users
            $input['photo_id'] = $photo->id;
        }
        else
        {
         $photo = Photo::create(['path'=>'user.png']);  
         $input['photo_id'] = $photo->id; 
        }
        
     
        User::create($input);

        Session::flash('user_created','User created!');

        return redirect('admin/users');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $user =User::findOrFail($id);
        // return dd($user->photo);
        $roles = Role::lists('name','id')->all(); 

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {




        // $user = User::findOrFail($id);

        // //Ako je pasvord prazan ili ako ga ima da ga kriptuje
        if (trim($request->password) == '') {
            $input = $request->except('password');
        }
        else
        {   
            $input = $request->all();
            $input['password'] = trim(bcrypt($request->password));

        }

       
       



        $input = $request->all();
        $user = User::findOrFail($id);

               if (trim($request->password) == '') {
                    $input = $request->except('password');
                }
                else
                {   
                    $input = $request->all();
                    $input['password'] = trim(bcrypt($request->password));

                }

                //Da li ima fotke sa forme?
             if ($file = $request->file('photo_id')) {
                    //da li ima fotke u bazi?
                    if($user->photo)
                    {
                        
                        $photoId =  $user->photo->id;
                        unlink(public_path().$user->photo->path);
                        $name = time() . $file->getClientOriginalName();
                        $file->move('images',$name);
           
                        $photo = Photo::whereId($photoId)->update(['path'=>$name]);
                        $input['photo_id'] = $photoId;
        // return $input;
                    }    
                    else
                    {
                        $name = time() . $file->getClientOriginalName();
                        $file->move('images',$name);
                        $photo = Photo::create(['path'=>$name]);
                       
                        $input['photo_id'] = $photo->id;
                    }


                }



                $user->update($input);
                return redirect('admin/users');


















    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $user = User::findOrFail($id);
        if ($user->photo){

            if ($user->photo->path =='/images/user.png') {
                $user->photo->delete();
               
            }
            else
            {
                unlink(public_path().$user->photo->path);
                $user->photo->delete();
            } 
        
        }   

        $user->delete();
        
        Session::flash('deleted_user','User deleted!');

        return redirect('/admin/users');






    }


















}
