<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\po;
use Illuminate\Support\Facades\DB;
class chartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getPO(){
        $currentMonth = now()->format('n');
        $currentYear = now()->year;
        $data = [];
       // $po = po::where('received','YES')->get();
       for($i = 1; $i <= $currentMonth ; $i++){

        $po = DB::table('po')
        ->where('received','YES')
        ->whereMonth('create_date',$i)
        ->sum('total');

    if(!$po){
        $po = 0 ;
    }
        array_push($data,$po);
        //->get();
       }
        //dd($data);
        return response()->json(['po'=>$data,'month'=>$currentMonth,'year'=>$currentYear]);
    }

 





   
 

  
}
