<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $guarded = [];
   //       protected $fillable = [
   //    'nameTH','nameEN','password','phone','email','department','position','role','phase',
   //    'statusR','statusA','signature',
   // ];
}
