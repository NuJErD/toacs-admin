<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use session;

class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    return view('login');
    }

   

    public function logincheck(Request $request){
        
        $getuser = users::where('email',$request->email)->first();
     
       if(!empty($getuser)){
        if($getuser->role == "admin"){
             if(Hash::check($request->password,$getuser->password)){
                Session()->put('admin', $getuser->id);   
                return redirect(route('home'));
                
             }else{
                session()->flash('error','password ไม่ถูกต้อง');
                return redirect()->route('login.index');
             }
            }else{
                session()->flash('error','เข้าได้เฉพาะ Admin');
                return redirect()->route('login.index');

            }
            
        
         }else{
             session()->flash('error','email ไม่ถูกต้อง');
             return redirect()->route('login.index');
         }
            
    }
    public function logout(Request $request)
    { 
    
        if(session()->has('user')){
              session()->forget('user');

         }
        else if(session()->has('admin')){
             session()->forget('admin');
        }
      
        
        return redirect()->route('login.index');
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
