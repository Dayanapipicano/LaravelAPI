<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public function imagesRelacion(){
        return $this->morphTo();
    }

    protected $fillable = [
        'url',
        'images_id',
        'images_type',
    ];
    protected $primaryKey = null; // Definir como null
    public $incrementing = false; // Importante para llaves compuestas

    protected $keyType = 'string'; // Tipo de dato de las llaves

    // Método para definir la llave primaria compuesta
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('images_id', '=', $this->getAttribute('images_id'))
            ->where('images_type', '=', $this->getAttribute('images_type'));
        return $query;
    }
}
