<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function shoppingCart(){
        return $this->belongsTo('App\Models\ShoppingCart');
    }
    public function Pago(){
        return $this->belongsTo('App\Models\Pay');
    }
    public function devolucion(){
        return $this->belongsTo('App\Models\Returns');
    }
    public function notificacions(){
        return $this->hasMany('App\Models\NotificationOrder');
    }
}
