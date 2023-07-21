<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\supplierType;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier =supplier::paginate(10);
       return view('supplier.index',compact('supplier'));
    }

    public function addsupplier()
    {
        $supType = supplierType::get();
        
       return view('supplier.add',compact('supType'));
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
       $sup = new supplier;
       $sup->code = $request->code;
       $sup->name = $request->name;
       $sup->SPnameTH = $request->SPnameTH;
       $sup->SPnameEN = $request->SPnameEN;
       $sup->phone = $request->phone;
       $sup->address = $request->address;
       $sup->credit = $request->credit;
       $sup->SPtype = $request->SPtype;
       $sup->email = $request->email;
       $sup->save();
        
       return redirect()->route('supplier.index');
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
    public function edit(supplier $supplier)
    {
        $sup = $supplier;
        $supType = supplierType::wherenot('id',$sup->SPtype)->get();
      return view('supplier.edit',compact('sup','supType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        //
        dd($supplier);
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
