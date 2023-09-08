<?php

namespace App\Exports;

use App\Models\users;
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

class UsersExport implements FromView, ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
    
        return view('exports.users', [
            'users' => users::all(),
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
                $cellRange = 'A1:F1'; // All headers
                $sheet = $event->sheet->getDelegate();
                $sheet->getStyle($cellRange)->getFont()->setSize(14);
                $sheet->getStyle($cellRange)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFA500');
                $sheet->freezePane('A2');
            },
        ];
    }
}
