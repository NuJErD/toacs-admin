<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\product;
use App\Models\supplier;
use App\Models\department;
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
        $department = department::get();
        return view('product.add',compact('department'));
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
        $department = implode(",",$request->department);
      
        $product = new product;
               
         $product->PnameTH = $request->PnameTH;
         $product->PnameEN = $request->PnameEN;
         $product->permission = $department;
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
         $p = $product;
         //แบ่งสินค้าตามแผนก
         $convertpermission = explode(",",$p->permission);
         $permissionUse = department::whereIn('id',$convertpermission)->get();
         $permission = department::whereNotIn('id',$convertpermission)->get();
         
         //ประเภทสินค้า
         $categories = categories::wherenot('id',$product->category)->get();
         $categories_use =categories::where('id',$product->category)->get();
         $categories_use = $categories_use[0];
         $supplier = supplier::wherenot('id',$product->supplier)->get();
         $supplier_use = supplier::where('id',$product->supplier)->first();
         

         
        
        return view('product.edit',compact('p','categories','categories_use','supplier','supplier_use','permissionUse','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,product $product)
    {
        
        $picname = $product->picture;
       
       if(isset($request->productpic)){
        unlink("./picture/product/".$picname);  
        $picture = $request->file('productpic');
        $name_gen = hexdec((uniqid())); 
        $name_type = strtolower($picture->getClientOriginalExtension());
        $picname = $name_gen.'.'.$name_type;
        
        $picture->move(public_path('picture/product'), $picname);
       }
       $department = implode(",",$request->department);
        product::where('id',$product->id)
        ->update(
            [
                'PnameTH' => $request->PnameTH,
                'PnameEN' => $request->PnameEN,
                'supplier' => $request->supplier,
                'category' => $request->category,
                'permission' => $department,
                'unit' => $request->unit,
                'price' => $request->price,
                'detail' => $request->detail,
                'picture' => $picname
            ]
        );
        return redirect()->route('product.index');
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
