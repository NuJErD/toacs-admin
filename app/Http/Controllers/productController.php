<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\product;
use App\Models\supplier;
use App\Models\department;
use App\Models\product_depart;
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
        
        $count = count($request->department);
     
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

       
         for($i=0;$i<$count;$i++){
            $product_depart = new product_depart;
            $departname = department::where('id',$request->department[$i])->value('departTH');
            $product_depart->products_id = $product->id;
            $product_depart->departments_id = $request->department[$i];
            $product_depart->departments_departTH = $departname;
            $product_depart->save();
           // dd($departname);
                   }
        //dd();
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
        $depart_use = product_depart::where('products_id',$p->id)->pluck('departments_id');
        $depart_use =  $depart_use->toArray();
        $departInuse = department::whereIn('id',$depart_use)->get();
        $depart = department::whereNotIn('id',$depart_use)->get();
        
         
         //ประเภทสินค้า
         $categories = categories::wherenot('id',$product->category)->get();
         $categories_use =categories::where('id',$product->category)->get();
         $categories_use = $categories_use[0];
         $supplier = supplier::wherenot('id',$product->supplier)->get();
         $supplier_use = supplier::where('id',$product->supplier)->first();
         

         
        
        return view('product.edit',compact('p','categories','categories_use','supplier','supplier_use','departInuse','depart'));
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
   
        product::where('id',$product->id)
        ->update(
            [
                'PnameTH' => $request->PnameTH,
                'PnameEN' => $request->PnameEN,
                'supplier' => $request->supplier,
                'category' => $request->category,
                
                'unit' => $request->unit,
                'price' => $request->price,
                'detail' => $request->detail,
                'picture' => $picname
            ]
        );

                
                $department = $request->department;
                // delete (แผนกที่ต้องการเอาออก)
                $depart_delete = product_depart::where('products_id',$product->id)
                ->whereNotIn('departments_id',$department)
                ->delete();
                //check ข้อมูลที่ยังไม่มีใน DB
                $depart_use = product_depart::where('products_id',$product->id)->pluck('departments_id');
                $depart_use =  $depart_use->toArray();
                $depart_forAdd = array_diff($department,$depart_use);
                $string = implode(',', $depart_forAdd);
                $depart_forAdd = explode(',', $string);
                
              //เพิ่มผนกที่ยังไม่มี (จาก input ที่ส่งมา) 
              if(count($depart_forAdd) != 1){
                $count = count($depart_forAdd); 
                for($i=0;$i<$count;$i++){
                     $product_depart = new product_depart;
                     $departname = department::where('id',$depart_forAdd[$i])->value('departTH');
                     $product_depart->products_id = $product->id;
                     $product_depart->departments_id = $depart_forAdd[$i];
                     $product_depart->departments_departTH = $departname;
                     $product_depart->save();
                 
                          }
              }
              
               //  dd($depart_forAdd);       
       
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
