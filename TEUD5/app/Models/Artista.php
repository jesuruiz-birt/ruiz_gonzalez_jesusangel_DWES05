<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    //
    protected $table = 'artistas';
    protected $primaryKey = 'id_artista';
    public $incrementing = true;

    protected $fillable = ['nombre', 'nacionalidad'];
}
