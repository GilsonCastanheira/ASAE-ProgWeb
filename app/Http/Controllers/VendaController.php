<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Venda;
use App\Produto;

class VendaController extends Controller
{
    function telaCadastroVendas(){
        $usuario = Usuario::all();

        return view("venda_usuario", [ "usuario" => $usuario ]);
    }

    function adicionar(Request $req){

        $id_usuario = $req->input('id_usuario');

        $venda = new Venda();
        $venda->valor = 0;
        $venda->id_usuario = $id_usuario;

        if ($venda->save()){
            $msg = "Venda adicionada com sucesso.";
        } else {
            $msg = "Venda não foi cadastrada.";
        }

        return redirect()->route('vendas_item_novo', ['id' => $venda->id]);
    }

    
    function listar(){
        $vendas = Venda::all();

        return view('lista_venda_geral', ['vendas' => $vendas]);
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

        $colunas_pivot = ['quantidade' => $quantidade,'subtotal' => $subtotal];
        $venda->produtos()->attach($produto->id, $colunas_pivot);
        $venda->valor += $subtotal;
        $venda->save();

        return redirect()->route('vendas_item_novo', ['id' => $venda->id]);
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

        return redirect()->route('vendas_item_novo', ['id' => $id]);
    }
}
