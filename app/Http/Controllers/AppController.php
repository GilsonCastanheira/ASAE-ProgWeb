<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioLogin;

class AppController extends Controller
{

	function telaLogin( ){
		return view("login");
	}

    function login(Request $req){
    	$login = $req->input('login');
    	$senha = $req->input('senha');

    	$usuario = UsuarioLogin::where('login', '=', $login)->first();

    	if($usuario && $usuario->senha == $senha){
             $variavel = [
                "login" => $login,
                "nome" => $usuario->nome
            ];
            session($variavel);
    		return redirect()->route("nome_usuarios");
    	}else{
    		return redirect()->route("tela_login");
    	}
    }

    function adicionar(Request $req){
        $nome = $req->input('nome');
        $login = $req->input('login');
        $senha = $req->input('senha');

        $usuario_login = new UsuarioLogin();
        $usuario_login->nome = $nome;
        $usuario_login->login = $login;
        $usuario_login->senha = $senha;

        if ($usuario_login->save()){
            $msg = "Usuário $nome adicionado com sucesso.";
        } else {
            $msg = "Usuário não foi cadastrado.";
        }

        return view("resultado", [ "mensagem" => $msg ]);
    }

    function logout(){
        session()->forget(["login", "nome"]);
        return redirect()->route('tela_login');
    }

    function cadastro(){
        return view('cadastro_usuario');
    }


}

