<?php

namespace App\Imports;

use App\Models\categories;
use App\Models\department;
use App\Models\product;
use App\Models\product_depart;
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
     
        $departmentIN = explode(',',$row['department']);
        $supplier = supplier::where('s_code',$row['supplier'])->value('s_code');
        $categoty = categories::where('code',$row['category'])->value('code');
        //dd($departmentIN);
    
       //check ข้อมูลที่ยังไม่มีใน DB
       $depart_use = product_depart::where('products_id',$row['department'])->pluck('departments_id');
       $depart_use =  $depart_use->toArray();
       $depart_forAdd = array_diff($departmentIN,$depart_use);
      //     dd($depart_forAdd);
       //เพิ่ม แผนกที่สามารถเห็นสินค้า
      
        foreach($depart_forAdd as $d){
            $dname = department::where('departTH',$d)->first();
           
           // dd($dname->code);
           $data = new product_depart([
                'products_id' => $row['id'],
                'departments_id' =>$dname->id ,
                'departments_departTH' => $dname->code
            ]);
            $data->save();
       }

       //อัพโหลดรูปภาพ
       $pic = $row['picture'];
       $file_info = pathinfo($pic);
        $name_gen = hexdec((uniqid()));
        $file_extension = $file_info['extension'];
       $picname = $name_gen.'.'.$file_extension;
       $this->downloadAndMoveFile($pic,$picname);
        
        return new product([
            'p_code' => $row['id'],
            'PnameTH' => $row['name_th'],
            'PnameEN' => $row['name_en'],
            'supplier' => $supplier,
            'category' => $categoty,
            'unit' => $row['unit'],
            'price' => $row['price'],
            'detail' => $row['detail'], 
            'picture' => $picname
        ]);
       
        }

        public function downloadAndMoveFile($pic,$name)
    {
        $path = "$pic";
        $destinationPath = 'picture/product/';
        Storage::disk('public')->put( $destinationPath.$name, file_get_contents($path));
    }
        

        public function uniqueBy()
        {
            return 'p_code';
        }
}


       
 

    