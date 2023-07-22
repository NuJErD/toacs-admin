<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\supplierType;
use Illuminate\Http\Request;
use DB;

class supplierTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $supplierType = supplierType::paginate(10);
        return view('supplierType.index',compact('supplierType'));
    }


    public function addSpType()
    {


        
        return view('supplierType.add');
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
        $supplierType = new supplierType;
        $supplierType->SPTnameTH = $request->SPTnameTH;
        $supplierType->SPTnameEN = $request->SPTnameEN;
        $supplierType->save();
        return redirect()->route('supplierType.index');
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
    public function edit(supplierType $supplierType)
    {
        $sup = $supplierType;
       return view('supplierType.edit',compact('sup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplierType $supplierType)
    {
        
        supplierType::where('id',$supplierType->id)
        ->update([
            'SPTnameTH' => $request->SPTnameTH,
            'SPTnameEN' => $request->SPTnameEN
        ]);
        
        return redirect()->route('supplierType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplierType $supplierType)
    {
        
        $check = supplier::where('SPtype',$supplierType->id)->first();
        if(isset($check)){
            session()->flash('error','ไม่สามารถลบรายการนี้ได้');
        }else{
            
           supplierType::where('id', $supplierType->id)->delete();
        
        }
        return redirect()->route('supplierType.index');
    }
}
