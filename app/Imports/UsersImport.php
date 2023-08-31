<?php
namespace App\Imports;

// use App\Models\department;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use App\Models\department;
use App\Models\position;
use App\Models\phase;


class UsersImport implements ToModel,WithHeadingRow,WithUpserts
{ /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
         $departvalue = explode(',',$row['department']);
         $position = explode(',',$row['position']);
         $depart =  department::whereIn('departTH',$departvalue)->pluck('id')->implode(',');
         $position = position::whereIn('posTH',$position)->pluck('id')->implode(',');
         $phase = phase::where('phaseTH',$row['phase'])->value('id');
        //dd($phase);
        return new users([
            'nameTH'     => $row['nameth'],
            'nameEN'    => $row['nameen'],
            'password' => bcrypt($row['password']),
            'phone' => $row['phone'],
            'email' => $row['email'],
            'department' => $depart,
            'position' => $position,
            'role' => $row['role'],
            'phase' => $phase,
            'statusR' => $row['statusr'],
            'statusA' => $row['statusa']

        ]);
        // return new users([
        //     'nameTH'     => $row[0],
        //     'nameEN'    => $row[1],
        //     'password' => bcrypt($row[2]),
        //     'phone' => $row[3],
        //     'email' => $row[4],
        //     'department' => $row[5],
        //     'position' => $row[6],
        //     'role' => $row[7],
        //     'phase' => $row[8],
        //     'statusR' => $row[9],
        //     'statusA' => $row[10]

        // ]);
    }
    public function uniqueBy()
        {
            return 'email';
        }
    }    
   
