<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\product;
use DB;



class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::paginate(7);
        
       return view('categories.index',compact('categories'));
      // return view('categories.add');
    }

    public function addcategories(){
        return view('categories.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
         $categ = new categories;
        $categ->code = $request->code;
        $categ->CnameTH = $request->CnameTH;
        $categ->CnameEN =$request->CnameEN;
        $categ->save();
        return redirect()->route('categories.index');
     } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $category)
    {
       
        $cat = $category;


       
        return view('categories.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $category)
    {   
        $check = product::where('category',$category->code)->first();
        if(isset($check)){
             product::where('category',$category->code)
        ->update([
            'category' => $request->code
        ]);
        }
       

        categories::where('id',$category->id)
        ->update(
            [
                'code' => $request->code,
                'CnameTH' => $request->CnameTH,
                'CnameEN' => $request->CnameEN
            ]
        );

        
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
       $check = product::where('category',$category->code)->first();
       if(isset($check)){
        return redirect()->route('categories.index')->with('error','ไม่สามารถลบได้');
       }else{
        categories::where('id',$category->id)->delete();
       }
       return redirect()->route('categories.index');
    }
}
