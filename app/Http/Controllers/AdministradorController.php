<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    function index(){ 
        return view('administrador.index');
    }

    function add(Request $dados) { 
        $administrador = new \App\Models\AdministradorModel();
        $administrador::create($dados->all());
    }
}
