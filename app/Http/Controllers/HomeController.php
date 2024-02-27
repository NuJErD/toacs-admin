<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\pr;
use App\Models\po;
use App\Models\pr_detail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productDATA = product::all();
      $price = $productDATA->pluck('price');
      $name = $productDATA->pluck('p_code');
      //dd(Session::all());
       return view('home',compact('price','name'));
    }

    
    public function PRbar(){
        $prcheck = pr::where('ApproveStatus','1')->pluck('prcode');
        $prcheck = explode(',',$prcheck);
        $po = pr_detail::where('pr_status','0')
        ->whereNotIn('PR_code',$prcheck)
        ->pluck('PR_code');
        //->get();
        //$po = count($po);
        return response()->json(['count'=> $po]);

    }

    public function Dash_Receive(){
         $total = po::join('po_detail','po.order_invoice','po_detail.po_order_invoice')
         ->where('approve_status','1')
         ->where('received','NO')
         ->where('deliver','0')
         ->count();
        // $total = po::where('approve_status','1')
        //   ->where('received','NO')
        //   ->first();
        // $total = $total->po_detail();  
       
        return response()->json(['total'=>$total]);
    }

    public function dash_total(){
        $from = '';
        $to = '';
        $year = carbon::now()->year;
        $price_toltal = po::whereYear('create_date', $year)->sum('total');
        return response()->json(['price_total'=>$price_toltal]);
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
