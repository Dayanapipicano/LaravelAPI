<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;
    public function pqr(){
        return $this->belongsTo('App\Models\PQR');
    }
    public function pedido(){
        return $this->hasOne('App\Models\Order');
    }
}
