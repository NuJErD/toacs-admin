<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\phase;
use App\Models\position;
use App\Models\department;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\file;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $userall = users::paginate(5);
        //dd($user);
        return view('Users.index',compact('userall'));
    }
    public function adduser()
    {
        $phase = phase::get();
        $position = position::get();
        $department = department::get();
        return view('Users.add',compact('phase','position','department'));
    }

    public function changePW(){

        return view('users.changePW');
    }

    public function search_user(Request $request){
        $input = $request->input;

        if(isset($input) && $input != ''){
            $user = users::where(function($query) use($input){
                
                $query->where('nameTH','like','%'. $input . '%');
               // ->orwhere('PnameTH','like','%'. $input . '%');
               // ->orwhere('brand','like','%'. $input . '%');
            })->get();
        } else{
            $user =users::all();
        }

        return response()->json($user);
    }



    public function changePWCF(Request $request){
        $oldpass = $request->oldpass;
        $newpass = $request->newpass;
        $cfpass = $request->cfnewpass;
        $password = users::where('id',session('admin'))->value('password');
           
        if(Hash::check($oldpass,$password)){
                if($newpass == $cfpass){
                    $password = Hash::make($newpass);
                    users::where('id',session('admin'))
                    ->update([
                        'password' => $password
                    ]);
                }else{
                    return back()->with('error','รหัสผ่านใหม่ไม่ตรงกัน');
                }
                
            return redirect()->route('home')->with('success','เปลี่ยนรหัสผ่านสำเร็จ');
        }else{
            return back()->with('error','รหัสผ่านเดิมไม่ถูกต้อง');
        }
       
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
        $user->username = $request->username;
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
         $picture->move(public_path('picture/signature'), $picname);
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
        $departinuse = department::whereIn('id',$convertdepartment)->get();
        $phaseinuse = phase::where('id',$user->phase)->get();
        $phaseinuse =  $phaseinuse[0];
        $positioninuse = position::where('id',$user->position)->get();
        $positioninuse = $positioninuse[0];
        // $userget= users::join('phases', 'phase', '=' , 'phases.id')
        // ->join('positions','position','=','positions.id')
        // ->join('departments', 'department','=','departments.id')
        // ->where('users.id',$user->id)->get();
        // $user = $user[0];
        $phase = phase::where('id', '!=',$user->phase)->get();
        $position = position::where('id','!=',$user->position)->get();
        $department = department::whereNotIn('id',$convertdepartment)->get();
        
        //dd($positioninuse);
        return view('Users.edit',compact('user','phase','position','department','departinuse','phaseinuse','positioninuse'));
        
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
       $destinationPath='C:/xampp/htdocs/app-admin/public/picture/signature/';
       $signame = $user->signature;
       $signameOLD = $user->signature;
       //dd($signame,$request->signature);
       if(isset($request->signature)){
        
       
       
         
        $signature = $request->file('signature');
        $name_gen = hexdec((uniqid())); 
        $name_type = strtolower($signature->getClientOriginalExtension());
        $signame = $name_gen.'.'.$name_type;
        
        $signature->move(public_path('picture/signature'), $signame);
       }
      
       
        $department = implode(",",$request->department);
        users::where('id',$user->id)
            ->update(
            [
            'username' => $request->username,
            'nameTH' => $request->nameTH,
            'nameEN' => $request->nameEN,
            'phone' => $request->phone,
            'email' => $request->email,
            'department' => $department,
            'position' => $request->position,
            'phase' => $request->phase,
            'statusR' => $request->statusR,
            'statusA' => $request->statusA,
            'signature' => $signame

            ]
        );
        file::delete($destinationPath.$signameOLD);
        return redirect()->route('user.index');
    }

    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls,csv'
    //     ]);

    //     $file = $request->file('file');
    //     dd($file);
    //     Excel::import(new userController, $file);

        
    // }
   
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
