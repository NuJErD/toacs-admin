<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\ProductImport;
use App\Imports\SupplierImport;
use App\Exports\UsersExport;
use App\Exports\ProductsExport;
use App\Exports\SuppliersExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;
//use App\Exports\UsersExport;

class ExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function UserImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        
        return redirect()->back()->with('success', 'Data imported successfully!');
    }
    //------product import------------------/
    public function ProductImport(Request $request) 
    {
       Excel::import(new ProductImport, $request->file('file')->store('temp')); 
        
       //$spreadsheet = IOFactory::load($request->file('file'));
      //  dd($spreadsheet->getActiveSheet()->getDrawingCollection());
      //  $this->extractAndMoveImages($request->file('file'));
        return redirect()->back()->with('success', 'Data imported successfully!');
    }

   

    //--------supplier import----------------/
    public function SupplierImport(Request $request) 
    {
        Excel::import(new SupplierImport, $request->file('file')->store('temp'));   
        return redirect()->back()->with('success', 'Data imported successfully!');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    //Users Export
    public function Usersexport() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }  
    //Product Export
    public function Productsexport() 
    {
       
        
        return Excel::download(new ProductsExport, 'product.xlsx');
    }  
    //supplier Export
    public function Suppliersexport() 
    {
        return Excel::download(new SuppliersExport, 'supplier.xlsx');
    }    
}
