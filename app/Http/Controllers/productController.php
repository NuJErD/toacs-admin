<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\product;
use Illuminate\Http\Request;



class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::paginate(5);
       // dd($product);
        return view('product.index',compact('product'));
    }

   
    public function addproduct(){
        return view('product.add');
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
        $product = new product;
               
         $product->PnameTH = $request->PnameTH;
         $product->PnameEN = $request->PnameEN;
         $product->category = $request->category;
         $product->supplier = $request->supplier;
         $product->unit = $request->unit;
         $product->price = $request->price;
         $product->detail = $request->detail;

         $picture = $request->file('productpic');
         $name_gen = hexdec((uniqid())); 
         $name_type = strtolower($picture->getClientOriginalExtension());
         $picname = $name_gen.'.'.$name_type;            
         $product->picture = $picname;
         $product->save();
         $picture->move(public_path('picture/product'), $picname);
         return redirect()->route('product.index');
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
    public function edit(product $product)
    {   
         $categoies = categories::wherenot('id',$product->category)->get();
         
         //dd($categoies);
        return view('product.edit',compact('product'));
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
