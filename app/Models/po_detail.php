<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class po_detail extends Model
{
    use HasFactory;
    protected $table = 'po_detail';
    protected $guarded = [];
    public $timestamps = false;
}
