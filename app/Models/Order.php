<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['idShoppingCart', 'idTypePay'];

    use HasFactory;
    public function shoppingCart()
    {
        return $this->belongsTo('App\Models\ShoppingCart', 'idShoppingCart');
    }

    public function typePay()
    {
        return $this->belongsTo('App\Models\TypePay', 'idTypePay');
    }
    public function devolucion(){
        return $this->belongsTo('App\Models\Returns');
    }
    public function notificacions(){
        return $this->hasMany('App\Models\NotificationOrder');
    }



}
