<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pr extends Model
{
    use HasFactory;
    protected $table = 'pr';
    public $timestamps = false;
    function pr_detail(){
        return $this->hasMany(pr_detail::class);
    }
}
