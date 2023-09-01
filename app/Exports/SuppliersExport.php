<?php

namespace App\Exports;

use App\Models\supplier;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuppliersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return supplier::all();
    }
}
