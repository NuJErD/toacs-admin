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
        $po_detail = po_detail::where('po_order_invoice',$po->order_invoice)
        ->join('pr_detail','po_detail.pr_code','pr_details.PR_code')
        ->select('*')
        ->get();

        dd($po_detail);
        $pdf = PDF::loadView('pdf.view',compact( 'po', 'po_detail'));
        

     return $pdf->setPaper('A4')->stream('pr.pdf');
    }
}

