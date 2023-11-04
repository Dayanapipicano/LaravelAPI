<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PQR extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\user');
    }
    public function devolucion(){
        return $this->hasOne('App\Models\Returns');
    }
}
