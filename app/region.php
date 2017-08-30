<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
  //nombre de la tabla de BD
  protect $table = 'region';

  protect $fillable = ['nombre', 'simbolo'];

    //
}
