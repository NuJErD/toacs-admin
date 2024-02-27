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
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\DomPDF\Facade ;

class pdfController extends Controller
{
 
    public function print_po($pono) {
        $po = po::where('order_invoice',$pono)->first();
       // $po_detail = po_detail::where('po_order_invoice',$po->order_invoice)->get();
        $po_detail = po_detail::join('products','po_detail.product_id','products.id')
        ->where('po_detail.po_order_invoice',$po->order_invoice)
        ->select('po_detail.*','products.p_code')
        ->get();
        $po_detail = array_chunk($po_detail->toarray(),20);
      //  dd($po_detail);
        $sum = 0;
        // for($i=0;$i<$po_detail->count();$i++){
        //     $sum += $po_detail[$i]['total'];
           
        // }
       
        $vat =  number_format($sum *0.07,2);
        $vat = floatval(str_replace(',', '', $vat));
        $sumtotal = $sum+$vat;
        #dd($vat,gettype($vat) );
        $sumtotal =number_format($sumtotal,2);
        $sum = number_format($sum,2);
       // $po_detail = $po_detail->chunk(20);
        $pdf = PDF::setPaper('A4');
       

        $pdf->loadView('pdf.view', compact('po', 'sum', 'vat', 'sumtotal', 'po_detail'));
        return $pdf->stream('pdf');
        

      
    //    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //     $pdf = PDF::loadView('pdf.view',compact( 'po', 'po_detail','sum','vat','sumtotal'))
    //     ->setPaper('A4');
        

     
    }
}

