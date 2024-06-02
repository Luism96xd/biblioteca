<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;

abstract class Controller
{
    public function leer (){
        return Publicacion::all();
    }
}
