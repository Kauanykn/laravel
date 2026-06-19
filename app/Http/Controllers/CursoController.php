<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CursoController extends Controller
{
    function index(){ 
        $curso = new \App\Models\CursoModel();

        return view('curso.index', ['cursos'=>$curso::all()]);
    }
    function add(Request $dados) { 
        $curso = new \App\Models\CursoModel();
        $curso::create($dados->all());

        $cursos = new \App\Models\CursoModel();
        return view('curso.index', ['success'=>'Cadastrado!', 'cursos'=>$cursos::all()]);
    }

    function remove(string $id) {
        $curso = new \App\Models\AlunoModel();
        $curso::destroy($id);

        return view('curso.index', ['success'=>'Removido!', 'cursos'=>$curso::all()]);

    }
    function atualizar(string $id) {
        $curso = new \App\Models\CursoModel();
        $curso = $curso::find($id);

        return view('curso.atualizar', ['curso'=>$curso]);
    }

    function save(Request $dados) {
        $curso = new \App\Models\CursoModel();
        $curso = $curso::find($dados->id);
        $curso->update($dados->all());

        return view('curso.index', ['success'=>'Atualizado!', 'cursos'=>$curso::all()]);
    }
}
