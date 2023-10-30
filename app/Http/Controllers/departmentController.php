<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $depart = department::paginate(10);
       return view('department.index',compact('depart'));
    }

    public function Add_depart(){
        return view('department.add');
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
        $de = new department ;
        $de->code = $request->code;
        $de->departTH = $request->departTH;
        $de->departEN = $request->departEN;
        $de->code_fac1 = $request->code_fac1;
        $de->code_fac5 = $request->code_fac5;
        $de->save();
        return redirect()->route('department.index')->with('success','บันทึกข้อมูลสำเร็จ');
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
    public function edit(department $department )
    {
        $department;
        //
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, department $department)
    {
        $department;
       department::where('id',$department->id)
       ->update([
         'code' =>  $request->code,
         'departTH' => $request->departTH,
         'departEN' => $request->departEN,
         'code_fac1' => $request->code_fac1,
         'code_fac5' => $request->code_fac5
       ]);
      
       return redirect()->route('department.edit',$department->id)->with('success','แก้ไขสำเร็จ');
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
