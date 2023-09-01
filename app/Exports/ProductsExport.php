<?php

namespace App\Exports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $a = DB::table('products')
        ->join('suppliers','products.supplier','=','suppliers.s_code')
       // ->join('categories','products.category','=','categories.code')
       // ->select('products.*')
        ->get(); 
        return $a;
    
    }
}
