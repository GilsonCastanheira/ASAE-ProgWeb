<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
	Route::get('/usuarios/listar_venda/', 'VendaController@listar')->name('listar_venda');
	Route::get('/usuarios', 'UsuariosControler@nomesUsuarios')->name("nome_usuarios");
Route::get('/usuarios/cadastro', 'UsuariosControler@cadastro');
Route::post('/usuarios/novo','UsuariosControler@novo')->name('usuario_novo');



Route::middleware(['eh_admin'])->group(function(){
Route::get('/cadastro', 'AppController@cadastro')->name('cadastro_usuario');
Route::post('/user/adicionar', 'AppController@adicionar')->name('adicionar_usuario');
Route::post('venda/{id}/itens/adicionar', 'VendaController@adicionarItem')->name('vendas_item_add');
Route::get('/venda/{id}/itens/remover/{id_produto}', 'VendaController@excluirItem')->name('vendas_item_delete');
Route::post('/usuarios/alterar/{id}', 'UsuariosControler@alterar')->name('alterar_usuario');

Route::get('/usuarios/excluir/{id}', 'UsuariosControler@excluir')->name('excluir_usuario');

Route::get('/usuarios/alterar/{id}', 'UsuariosControler@alterarUsuario')->name('atualizar_usuario');

Route::get('/usuarios/cadastro_vendas/', 'VendaController@telaCadastroVendas')->name('venda_cadastro');

Route::post('/usuarios/adicionar_venda/', 'VendaController@adicionar')->name('venda_add');


Route::get('/venda/{id}/itens', 'VendaController@itensVenda')->name('vendas_itens');
Route::get('/venda/{id}/itens/novo', 'VendaController@telaAdicionarItem')->name('vendas_item_novo');

});
});




Route::get('/tela_login', 'AppController@telaLogin')->name("tela_login");
Route::post('/login', 'AppController@login')->name('login');



Route::get('/logout', 'AppController@logout')->name('logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
