<?php

namespace App\Exports;

use App\Models\po_detail;
use App\Models\po;
use App\Models\supplier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PoExport implements FromView, ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
   
    public function  view(): View
    {
        
        return view('exports.po', [
            'po' => po_detail::whereBetween('po_detail.create_date',[$this->start->startOfDay(),$this->end->endOfDay()])->where('po_detail.deliver','1')
            ->join('po','po_detail.po_order_invoice','=','po.order_invoice')
                ->select('po_detail.*','po.supplier_name')
               ->get()
        ]);
    }
    // public function headings(): array
    // {
    //     return [
    //         'รหัสสินค้า',
    //         'ชื่อสินค้า-TH',
    //         'ชื่อสินค้า-EN',
    //         'ราคา',
    //         'ประเภท',
    //         'ซัพพลายเออร์'
    //     ];
    // }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:J1'; // All headers
                $sheet = $event->sheet->getDelegate();
                $sheet->getStyle($cellRange)->getFont()->setSize(14);
                $sheet->getStyle($cellRange)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFA500');
                $sheet->freezePane('A2');
               // $sheet->getColumnDimension('C')->setWidth(30);
                //$highestRow = $sheet->getHighestRow();

                // Format columns as text to prevent scientific notation
              // $sheet->getStyle('C2:C'.$highestRow)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT); // Adjust range as needed
                
            },
        ];
    }
}
