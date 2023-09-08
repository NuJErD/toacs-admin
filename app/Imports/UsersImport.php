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
use Illuminate\Support\Facades\Storage;


class UsersImport implements ToModel,WithHeadingRow,WithUpserts
{ /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
         $departvalue = explode(',',$row['department']);
        // $position = explode(',',$row['position']);
         $position = $row['position'];
         $depart =  department::whereIn('departTH',$departvalue)->pluck('id')->implode(',');
        // $position = position::whereIn('posTH',$position)->pluck('id')->implode(',');
         $position = position::where('posTH',$position)->value('id');
        //dd($position);
         $phase = phase::where('phaseTH',$row['phase'])->value('id');

    //upload pic error extension
        $pic = $row['picture'];
        $file_info = pathinfo($pic);
        $name_gen = hexdec((uniqid()));
        $file_extension = $file_info['extension'];
       $picname = $name_gen.'.'.$file_extension;
       $this->downloadAndMoveFile($pic,$picname);
        //dd($picname);
      
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
            'statusA' => $row['statusa'],
            'signature' => $picname

        ]);
         
       
    }
    public function downloadAndMoveFile($pic,$name)
    {
        
        $path = "$pic";
   
        $destinationPath = 'picture/signature/';
        Storage::disk('public')->put( $destinationPath.$name, file_get_contents($path));
    }

    public function uniqueBy()
        {
            return 'email';
        }
    }    
   
