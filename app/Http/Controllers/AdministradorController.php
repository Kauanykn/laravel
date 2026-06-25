<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdministradorController extends Controller
{
    function index(){ 
        $administrador = new \App\Models\AdministradorModel();

        return view('administrador.index', ['administradores'=>$administrador::all()]);
    }

    function add(Request $dados) { 
        $validator = Validator::make(
            $dados->all(),
            [
                'nome' => 'required|min:3|max:255',
                'email' => 'required|email|max:255|unique:administrador,email',
                'telefone' => 'required|digits:11',
                'cpf' => 'required|string|max:14|unique:administrador,cpf',
                'usuario' => 'required|string|max:50|unique:administrador,usuario',
                'status' => 'required|string|max:50',
                'senha' => 'required|string|min:6|max:255'
            ],
            [
                'nome.required' => 'O campo nome é obrigatório.',
                'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',

                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O campo email deve ser um endereço de email válido.',
                'email.unique' => 'O email informado já está em uso.',

                'telefone.required' => 'O campo telefone é obrigatório.',
                'telefone.digits' => 'O telefone deve conter exatamente 11 dígitos.',

                'cpf.required' => 'O campo cpf é obrigatório.',
                'cpf.max' => 'O campo cpf deve conter no máximo 14 caracteres.',
                'cpf.unique' => 'O cpf informado já está em uso.',

                'usuario.required' => 'O campo usuário é obrigatório.',
                'usuario.max' => 'O campo usuário deve conter no máximo 50 caracteres.',
                'usuario.unique' => 'O usuário informado já está em uso.',

                'status.required' => 'O campo status é obrigatório.',
                'status.max' => 'O campo status deve conter no máximo 50 caracteres.',

                'senha.required' => 'O campo senha é obrigatório.',
                'senha.min' => 'O campo senha deve conter no mínimo 6 caracteres.',
                'senha.max' => 'O campo senha deve conter no máximo 255 caracteres.',
            ]
        );
        
        if ($validator->fails()) {
            return redirect()
                ->route('administrador.index')
                ->withErrors($validator)
                ->withInput();
        }

        $administrador = new \App\Models\AdministradorModel();
        $administrador::create($dados->all());

        $administradores = new \App\Models\AdministradorModel();
        return view('administrador.index', ['success'=>'Cadastrado!', 'administradores'=>$administradores::all()]);
    }
    function remove(string $id) {
        $administrador = new \App\Models\AdministradorModel();
        $administrador::destroy($id);

        return view('administrador.index', ['success'=>'Removido!', 'administradores'=>$administrador::all()]);

    }
    function atualizar(string $id) {
        $administrador = new \App\Models\AdministradorModel();
        $administrador = $administrador::find($id);

        return view('administrador.atualizar', ['administrador'=>$administrador]);
    }

    function save(Request $dados) {
        $administrador = new \App\Models\AdministradorModel();
        $administrador = $administrador::find($dados->id);
        $administrador->update($dados->all());

        return view('administrador.index', ['success'=>'Atualizado!', 'administradores'=>$administrador::all()]);
    }
}
