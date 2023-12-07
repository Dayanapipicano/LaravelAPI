<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePay extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

  /*   public function pago()
    {
        return $this->belongsTo('App\Models\Pay');
    } */

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'idTypePay');
    }
}
