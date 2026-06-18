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

        $administradores = new \App\Models\AdministradoresModel();
        return view('administrador.index', ['success'=>'Cadastrado!', 'administradores'=>$administradores::all()]);
    }
    function remove(string $id) {
        $administrador = new \App\Models\AdministradorModel();
        $administrador::destroy($id);

        return view('administrador.index', ['success'=>'Removido!', 'administradores'=>$administrador::all()]);

    }
}
