<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Resena extends Model
{

	use SoftDeletes;

   protected $table = "resena";
   protected $primaryKey = "id_resena";

   protected $dates = ['deleted_at'];

    protected $fillable = [
        'titulo', 'autor', 'anio', 'paginas', 'nombreFoto', 'extFoto', 'textoResena', 'id_usuario', 'id_categoria'
    ];

}
