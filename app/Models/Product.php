<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'concentration',
        'idSeason',
    ];
    
    public function favoritos(){
        return $this->hasMany('App\Models\Favorite');
    }
    public function shoppingCarts(){
        return $this->hasMany('App\Models\ShoppingCart');
    }
    public function image(){
        return $this->morphOne('App\Models\Image','images');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment','comments');
    }
    public function season()
{
    return $this->belongsTo('App\Models\Season', 'idSeason');
}



}
