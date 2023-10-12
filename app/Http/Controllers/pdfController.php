<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use League\Flysystem\Visibility;
use FormatResponse;
use App\Models\phase;
use App\Models\pr;
use App\Models\po;
use App\Models\po_detail;
use App\Models\product;
use App\Models\department;
use App\Models\users;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class pdfController extends Controller
{
 
    public function print_po($pono) {
        $po = po::where('order_invoice',$pono)->first();
        $po_detail = po_detail::where('po_order_invoice',$po->order_invoice)->get();
        
        $sum = 0;
        for($i=0;$i<$po_detail->count();$i++){
            $sum += $po_detail[$i]['total'];
        }
        $vat =  number_format($sum *0.07,2);
        $sumtotal = $sum+$vat;
        $sumtotal =number_format($sumtotal,2);
       //dd();
        $pdf = PDF::loadView('pdf.view',compact( 'po', 'po_detail','sum','vat','sumtotal'));
        

     return $pdf->setPaper('A4')->stream('pr.pdf');
    }
}

