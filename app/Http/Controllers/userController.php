<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\phase;
use App\Models\position;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = users::get();
        return view('Users.index',compact('user'));
    }
    public function adduser()
    {
        $phase = phase::get();
        $position = position::get();
        $department = department::get();
        return view('Users.add',compact('phase','position','department'));
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
        $password = hash::make($request->password);
        $role ='user';
        $department = implode(",",$request->department);

        $user = new users;
        $user->nameTH = $request->nameTH;
        $user->nameEN =$request->nameEN;
        $user->password = $password;
        $user->phone = $request->phone;
        $user->email =$request->email;
        $user->department =$department;
        $user->position =$request->position;
        $user->phase = $request->phase;
        $user->statusR = $request->requester;
        $user->statusA = $request->approve;
        $user->role  = $role;
        //------เพิ่มรูป------
        $picture = $request->file('signature');
        $name_gen = hexdec((uniqid())); 
        $name_type = strtolower($picture->getClientOriginalExtension());
        $picname = $name_gen.'.'.$name_type;    
        $user->signature = $picname;    
         $picture->move(public_path('signaturePicture'), $picname);
        $user->save();
        return redirect()->route('user.index');
        // $user->signature =
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
    public function edit(users $user)
    {
        $convertdepartment = explode(",",$user->department);
        $user= users::join('phases', 'phase', '=' , 'phases.id')
        ->join('positions','position','=','positions.id')
        ->join('departments', 'department','=','departments.id')
        ->where('users.id',$user->id)->get();
        $user = $user[0];
        
        $phase = phase::where('id', '!=',$user->phase)->get();
      
        $position = position::where('id','!=',$user->position)->get();
        $department = department::where('id','!=',$user->department)->get();
        
        dd($convertdepartment);
        return view('Users.edit',compact('user','phase','position','department'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $user)
    {
        dd('aaaasas');
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
