<?php

namespace App\Imports;

use App\Models\categories;
use App\Models\product;
use App\Models\supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ProductImport implements ToModel,WithHeadingRow,WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $supplier = supplier::where('s_code',$row['supplier'])->value('id');
        $categoty = categories::where('code',$row['category'])->value('id');
       
        return new product([
            'p_code' => $row['p_code'],
            'PnameTH' => $row['pnameth'],
            'PnameEN' => $row['pnameen'],
            'supplier' => $supplier,
            'category' => $categoty,
            'unit' => $row['unit'],
            'price' => $row['price'],
            'detail' => $row['detail'] 
        ]);
    }
    public function uniqueBy()
        {
            return 'p_code';
        }
}
