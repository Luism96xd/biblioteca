<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index(){
        $publicaciones = Publicacion::all();

        return response()->json([
            'data' => $publicaciones,
        ]);
    }

    public function store(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
