<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
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
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new UsersImport, 'users-collection.xlsx');
    }    
}
