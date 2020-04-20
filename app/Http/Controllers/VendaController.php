<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Venda;
use App\Produto;

class VendaController extends Controller
{
    function telaCadastroVendas($id){
        $usuario = Usuario::find($id);

        return view("venda_usuario", [ "u" => $usuario ]);
    }

    function adicionar(Request $req, $id){
        $descricao = $req->input('descricao');
        $valor = $req->input('valor');
        $venda = new Venda();
        $venda->id_usuario = $id;
        $venda->descricao = $descricao;
        $venda->valor = $valor;
        if ($venda->save()){
            $msg = "O produto $descricao foi cadastrado";
        }else{
            $msg = "Erro no cadastramento";
        }
        return redirect()->route('vendas_item_novo',  ['id' => $venda->id]);
        //return view("retorno_venda", [ "mensagem" => $msg ]);
    }
    function listar($id){
        $vendas = Venda::all();
        $usuarios = Usuario::find($id)->vendas;

        return view("lista_venda", [ "vendas" => $vendas ]);
    }

    function itensVenda($id){
        $venda = Venda::find($id);
        return view('lista_itens_venda',['venda' =>$venda]);
    }

    function telaAdicionarItem($id){
        $venda = Venda::find($id);
        $produto = Produto::all();
        return view('tela_cadastro_itens',['venda' =>$venda, 'produtos' =>$produto]);
    }

    function adicionarItem(Request $req, $id){
        $id_produto = $req->input('id_produto');
        $quantidade = $req->input('quantidade');

        $produto = Produto::find($id_produto);
        $venda = Venda::find($id);
        $subtotal = $produto->preco * $quantidade;

        $colunas_pivot = [
            'quantidade' => $quantidade,
            'subtotal' => $subtotal
        ];
        $venda->produtos()->attach($produto->id, $colunas_pivot);
        $venda->valor += $subtotal;
        $venda->save();

        return redirect()->route('vendas_item_novo', 
            ['id' => $venda->id]);
    }

    function excluirItem($id, $id_produto){
        $venda = Venda::find($id);
        $subtotal = 0;

        foreach($venda->produtos as $vp){
            if ($vp->id == $id_produto){
                $subtotal = $vp->pivot->subtotal;
                break;
            }
        }
        $venda->valor = $venda->valor - $subtotal; 
        $venda->produtos()->detach($id_produto);
        $venda->save();

        return redirect()->route('vendas_item_novo', 
            ['id' => $id]);
    }
}
