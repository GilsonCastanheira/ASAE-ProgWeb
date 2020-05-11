<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Auth;
class UsuariosControler extends Controller
{
    
    function nomesUsuarios(){
        if(session()->has("login")){
    	   $lista = [];
    	   $usuarios = Usuario::all();
    	   return view("lista", ["usuarios"=> $usuarios]);
        }
    }
    function cadastro(){
    	return view("cadastro");
    }

    function novo(Request $req){
    	$nome = $req->input('nome');
    	$endereco = $req->input('endereco');
    	$cep = $req->input('cep');
    	$cidade = $req->input('cidade');
    	$estado = $req->input('estado');
    	$usuario = new Usuario();
    	$usuario->nome = $nome;
    	$usuario->endereco = $endereco;
    	$usuario->cep = $cep;
    	$usuario->cidade = $cidade;
    	$usuario->estado = $estado;
    	$usuario->save();
    	if($usuario->save()){
    		$mensagem = "O usuário $nome foi inserido";
    	}else{
    		$mensagem = "Erro na inserção";
    	}
    	return view("resultado", ["msg" => $mensagem]);
    }

    function alterarUsuario($id){
        $usuario = Usuario::find($id);

        return view("tela_alterar_usuario", [ "u" => $usuario ]);
    }

    function alterar(Request $req, $id){
        $usuario = Usuario::find($id);

        $nome = $req->input('nome');
        $endereco = $req->input('endereco');
        $cep = $req->input('cep');
        $cidade = $req->input('cidade');
        $estado = $req->input('estado');

        $usuario->nome = $nome;
        $usuario->endereco = $endereco;
        $usuario->cep = $cep;
        $usuario->cidade = $cidade;
        $usuario->estado = $estado;

        if ($usuario->save()){
            $msg = "O usuário $nome foi alterado";
        } else {
            $msg = "Erro na alteração";
        }

        return view("resultado", [ "msg" => $msg]);
    }

    function excluir($id){
        $usuario = Usuario::find($id);
        if ($usuario->delete()){
            $msg = "O usuário $id foi excluído";
        } else {
            $msg = "Erro na exclusão";
        }
        return view("resultado", [ "msg" => $msg]);
    }

    function listar(){
    
        $usuarios = Usuario::all();

        return view("lista", [ "us" => $usuarios ]);

        
    }
}
