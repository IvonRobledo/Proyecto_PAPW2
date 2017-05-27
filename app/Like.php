<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
   public $timestamps = false;
	protected $table = "megusta";
   	protected $primaryKey = "id_meGusta";
    protected $fillable = [
        'id_usuario', 'id_resena'
    ];

}
