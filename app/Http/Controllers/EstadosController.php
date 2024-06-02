<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function index(){
        $estados = Estado::all();

        return response()->json([
            'data' => $estados,
        ]);
    }
}
