<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Comentario extends Model
{
   public $timestamps = false;
	protected $table = "comentario";
   	protected $primaryKey = "id_comentario";
    protected $fillable = [
        'texto_comentario', 'id_usuario', 'id_resena'
    ];

}
