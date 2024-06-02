<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $table = "publicaciones";
    protected $primaryKey = "id_publicacion";

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'id_persona',
        'portada',
        'resumen',
        'etiquets',
        'codigo_barras'
    ];
}
