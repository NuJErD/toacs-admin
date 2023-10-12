<?php

namespace App\Exports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ProductsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       $a = DB::table('products')
        ->join('suppliers','products.supplier','=','suppliers.s_code')
       ->join('categories','products.category','=','categories.code')
      ->select('products.p_code','products.PnameTH','products.PnameEN','products.price','categories.CnameTH','suppliers.SPnameTH') //*เลือกข้อมูลที่ต้องการ 
       ->get();
      
        return $a;
        
    
    }
    
    public function headings(): array
    {
        return [
            'รหัสสินค้า',
            'ชื่อสินค้า-TH',
            'ชื่อสินค้า-EN',
            'ราคา',
            'ประเภท',
            'ซัพพลายเออร์'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:F1'; // All headers
                $sheet = $event->sheet->getDelegate();
                $sheet->getStyle($cellRange)->getFont()->setSize(12);
                $sheet->getStyle($cellRange)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFA500');
                $sheet->freezePane('A2');
            },
        ];
    }
}
