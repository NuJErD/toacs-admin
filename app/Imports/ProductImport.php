<?php

namespace App\Imports;

use App\Models\categories;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

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
       //dd($row);
        
        return new product([
            'p_code' => $row['p_code'],
            'PnameTH' => $row['pnameth'],
            'PnameEN' => $row['pnameen'],
            'supplier' => $supplier,
            'category' => $categoty,
            'unit' => $row['unit'],
            'price' => $row['price'],
            'detail' => $row['detail'], 
            //'picture' => $row['picture']
        ]);
       
        }

        public function uniqueBy()
        {
            return 'p_code';
        }
}


       
 

    