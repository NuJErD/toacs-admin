<?php

namespace App\Http\Controllers;

use App\Models\pr_detail;
use App\Models\pr;
use App\Models\po;
use App\Models\po_detail;
use App\Models\user;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class poController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $po = po::join('suppliers','po.supplier_id','=','suppliers.id')
        ->select('po.*','suppliers.SPnameTH')
        ->paginate(5);
       // $po = po::get();
      // dd($po);
       return view('po.index',compact('po'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//-----------------------create PO---------------------//
    public function PoCreate()
    {   
         $ponum = po::whereDate('create_date','=', date('Y-m-d'))
        ->orderBy('create_date','desc')
        ->first();

        $time = Carbon::now()->toDateTimeString();
    
        //เรียงออเอร์ตามเวลาสั่ง
        $num =0;
        if(isset($ponum)){
            $num = substr($ponum->order_invoice, -4);
            $num = $num+1;       
        }else{
            $num = 1 ;
        }

        $ponumber =  date('Ymd') . str_pad($num,4,'0', STR_PAD_LEFT);
        $supplier = session('PoSup');
        $user = user::where('id',session('admin'))->value('nameTH');
        $sup_id = supplier::where('s_code',session('PoSup'))->value('id');
       
        
        $po = new po ;
        $po->order_invoice =  $ponumber;
        $po->admin_id = session('admin');
        $po->admin_name = $user;
        $po->supplier_id = $sup_id;
        $po->supplier_code = session('PoSup');
        $po->create_date = $time;
        $po->save();
        
        return response()->json($ponumber);
        //dd($num);



       
    }

//---------------เปิดหน้า PO-----------//
    public function popage(Request $request){
        
        $po  = po::where('order_invoice',$request->code)->first();
        Session()->put('PoSup',$po->supplier_code);
        $sup = supplier::where('s_code',session('PoSup'))->first(); 
        return view('po.add',compact('sup','po'));
       
    }

//-------------------session supply and go create po-----------//
    public function PoCreate2( Request $request)
    {
        $sup = supplier::where('SPnameTH',$request->sup)->value('s_code');
        Session()->put('PoSup',$sup);
       return redirect()->route('PoCreate');
       
    }


//---------------------add PO-Detail-------------------------//
    public function po_detail(Request $request){

        $Pname = product::where('id',$request->product)->value('PnameTH');
        $podetail = new po_detail;
        $podetail->po_order_invoice = $request->poID;
        $podetail->pr_code = $request->PRNO;
        $podetail->product_id = $request->product;
        $podetail->product_name = $Pname;
        $podetail->QTY = $request->QTY;
        $podetail->unit = $request->unit;
        $podetail->price = $request->price;
        $podetail->total = $request->total;
        $podetail->date = $request->date;
        $podetail->note = $request->note;
        $podetail->save();

        $prID = pr::where('prcode',$request->PRNO)->value('id');
        $a= pr_detail::where('PR_id',$prID)
        ->where('products_id',$request->product)
        ->update([
            'pr_status' => '1'
        ]);
        
        $totalPO = po::where('order_invoice',$request->poID)->value('total');
        $totalPO = $totalPO + $request->total;
        $PO_update = po::where('order_invoice',$request->poID)
        ->update([
            'total' => $totalPO
        ]);

        return response()->json();

    
    }

//------------------------------------get data -------------------------------------------------------------------------//
    public function getsup(){
        $check = pr::where('status','1')->pluck('id');
        $sup = pr_detail::where('pr_status','0')
        ->whereIn('PR_id',$check)
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
        // $productlist = pr_detail::where('product_sup',session('PoSup'))
        // ->where('pr_status','0')
        // ->distinct('PR_id')
        // ->pluck('products_id');
        //->select('PR_id','products_id')
        //->get();

         $prlistcheck = pr::whereIn('id',$prlist)
         ->pluck('prcode');
        return response()->json($prlistcheck);
     }

     public function getproduct(Request $request){
           $pr = pr::where('prcode',$request->prno)->first();
           $productID = $pr->pr_detail()
           ->where('pr_status','0')
           ->where('PR_id',$pr->id)
           ->where('product_sup',session('PoSup'))
           ->distinct('products_id')->pluck('products_id');
            $product = product::whereIn('id',$productID)
            ->select('products.id','products.PnameTH')->get();
            
            return response()->json( $product);
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


     public function get_po_detail(Request $request ){
        $po_detail = po_detail::where('po_order_invoice',$request->id)->get();
        return response()->json($po_detail);
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
