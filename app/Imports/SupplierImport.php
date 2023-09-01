<?php

namespace App\Imports;

use App\Models\supplier;
use App\Models\supplierType;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SupplierImport implements ToModel,WithHeadingRow,WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //แกไขให้สมบูรณ์
    public function model(array $row)
    {
       
        $SPtype = supplierType::where('SPTnameTH',$row['sptype'])->value('id');
        return new supplier([
            's_code' => $row['code'],
            'name' => $row['name'],
            'SPnameTH' => $row['spnameth'],
            'SpnameEN' =>  $row['spnameen'],
            'phone' =>  $row['phone'],
            'address' =>$row['address'] ,
            'credit' =>$row['credit'],
            'SPtype' =>$SPtype,
            'email' => $row['email']
           
          
        ]);
    }
    public function uniqueBy()
        {
            return 's_code';
        }
}
