<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    public function tipoPago(){
        return $this->hasOne('App\Models\TypePay');
    }
    public function pedido(){
        return $this->hasOne('App\Models\Order');
    }
}
