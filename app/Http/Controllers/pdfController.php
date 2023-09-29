<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use League\Flysystem\Visibility;
use FormatResponse;
use App\Models\phase;
use App\Models\pr;
use App\Models\product;
use App\Models\department;
use App\Models\users;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class pdfController extends Controller
{

    public function print_po() {
        $pdf = PDF::loadView('pdf.view');
        

     return $pdf->setPaper('A4')->stream('pr.pdf');
    }
}

