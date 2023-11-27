<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Support\Str;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'lastName',
        'typeDocument',
        'document',
        'phone',
        'email',
        'password',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasAnyRole($roles)
    {
        return $this->hasAnyRole($roles);
    }
    

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function pqrs()
    {
        return $this->hasMany(PQR::class);
    }

 

    public function favoritos()
    {
        return $this->hasMany(Favorite::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imagesRelacion');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comments');
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function hasPermissionThroughRole($permission)
{
    return $this->hasAnyPermission([$permission]);
}


  
}
