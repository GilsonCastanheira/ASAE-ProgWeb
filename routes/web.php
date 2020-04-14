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
Route::get('/usuarios', 'UsuariosControler@nomesUsuarios')->name("nome_usuarios");
Route::get('/usuarios/cadastro', 'UsuariosControler@cadastro');
Route::post('/usuarios/novo','UsuariosControler@novo')->name('usuario_novo');

Route::get('/tela_login', 'AppController@telaLogin')->name("tela_login");
Route::post('/login', 'AppController@login')->name('login');

Route::post('/usuarios/alterar/{id}', 'UsuariosControler@alterar')->name('alterar_usuario');

Route::get('/usuarios/excluir/{id}', 'UsuariosControler@excluir')->name('excluir_usuario');

Route::get('/usuarios/alterar/{id}', 'UsuariosControler@alterarUsuario')->name('atualizar_usuario');

Route::get('/usuarios/cadastro_vendas/{id}', 'VendaController@telaCadastroVendas')->name('venda_cadastro');

Route::post('/usuarios/adicionar_venda/{id}', 'VendaController@adicionar')->name('venda_add');

Route::get('/usuarios/listar_venda/{id}', 'VendaController@listar')->name('listar_venda');

Route::get('/cadastro', 'AppController@cadastro')->name('cadastro_usuario');
Route::post('/user/adicionar', 'AppController@adicionar')->name('adicionar_usuario');

Route::get('/logout', 'AppController@logout')->name('logout');