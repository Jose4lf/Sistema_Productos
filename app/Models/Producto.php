<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'producto';
    public function user() {
         //Singular ya que un único usuario ha registrado los productos
        //return $this->belongsTo(User::class);//belonsTo devuelve el id propietario de la coleccion
        return $this->belongsTo('App\Models\User'); //segunda forma de devolve
    }
}
