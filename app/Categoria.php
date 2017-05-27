<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
   protected $table = "categoria";
   protected $primaryKey = "id_categoria";

    protected $fillable = ['nombre_categoria'];

}
