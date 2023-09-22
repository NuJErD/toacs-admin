<?php

namespace App\Http\Controllers;

use App\Models\pr_detail;
use App\Models\pr;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;

class poController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('po.index');
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PoCreate()
    {
        //dd(session('PoSup'));
       $sup = supplier::where('s_code',session('PoSup'))->first(); 
       return view('po.add',compact('sup'));
    }

    public function PoCreate2( Request $request)
    {
        $sup = supplier::where('SPnameTH',$request->sup)->value('s_code');
        Session()->put('PoSup',$sup);
        return redirect()->route('PoCreate');
       
    }

//------------------------------------get data -------------------------------------------------------------------------//
    public function getsup(){
        $sup = pr_detail::where('pr_status','0')
        ->distinct()->pluck('product_sup');
        // $supname = supplier::whereIn('s_code',$sup)->pluck('SPnameTH');
        // $supcode = supplier::whereIn('s_code',$sup)->pluck('s_code');
        $supname = supplier::whereIn('s_code',$sup)
        ->pluck('SPnameTH');
        
        
        return response()->json($supname);
    }
    
     public function get_prlist(){
        $prlist = pr_detail::where('product_sup',session('PoSup'))
        ->where('pr_status','0')
        ->distinct('PR_id')
        ->pluck('PR_id');

         $prlistcheck = pr::whereIn('id',$prlist)->pluck('prcode');
        return response()->json($prlistcheck);
     }

     public function getproduct(Request $request){
           $pr = pr::where('prcode',$request->prno)->first();
           $productID = $pr->pr_detail()->where('PR_id',$pr->id)->distinct('products_id')->pluck('products_id');
            $product = product::whereIn('id',$productID)
            ->select('products.id','products.PnameTH')->get();
            
            return response()->json($product);
     }

     public function get_productdetail(Request $request){
        $id = pr::where('prcode',$request->pr)->value('id');
            $pr = pr_detail::where('PR_id', $id)
            ->where('products_id', $request->product)
            ->first();
        $date = pr::where('prcode',$request->pr)
         ->value('use_date');
        
        $unit = product::where('id',$request->product)->value('unit');
         
        return response()->json([$pr,$date,$unit]);
     }
//-----------------------------------------------------------------------------------------------------------------//

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
