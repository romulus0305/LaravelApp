<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UserRequest;



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
         //Daje listu JSON edvi sisa kurac
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


        $input = $request->all();

        //Cuva otku ako je ima
        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            //Cuvanje fotke u bazi u tabeli photos
            $photo = Photo::create(['path'=> $name]);
            //Dodavanje id novosacuvane fotke da bi ga sacuvao u tabeli users
            $input['photo_id'] = $photo->id;
        }
      
        //Sifrovanje passworda
        $input['password'] = bcrypt($request->password);
        User::create($input);
        // return redirect('admin/users');
         
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
          return view('admin.users.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
