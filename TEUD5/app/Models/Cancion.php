<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    //
    protected $table = 'canciones';
    protected $primaryKey = 'id_cancion';
    public $incrementing = true;

    protected $fillable = ['nombre', 'genero', 'anio_lanzamiento', 'id_artista'];

    public function artista()
    {
        return $this->belongsTo(Artista::class, 'id_artista', 'id_artista');
    }
}
