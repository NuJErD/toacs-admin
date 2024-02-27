<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class po extends Model
{
    protected $table = 'po';
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;

    // function po_detail(){
    //     return $this->hasMany(po_detail::class,'order_invoice');
    // }
}
