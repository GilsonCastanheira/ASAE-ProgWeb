@extends('template_venda')
@section('venda')
    
  <h1 class="display-4">Lista de Vendas</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th> 
        <th>Descrição</th>
        <th>Valor</th>
        <th>Data</th>
        <th>Operações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($vendas as $v)
      <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->descricao }}</td>
        <td>{{ $v->valor}}</td>
        <td>{{ $v->created_at}}</td>
        <td><a class="btn btn-info" href="{{route('vendas_itens', ['id'=>$v -> id])}} ">Itens</a></td>

      </tr>
      @endForeach
    </tbody>
  </table>
  <a class="btn btn-primary" href="{{ route('nome_usuarios') }}">Mostrar Clientes</a>
  

  
@endsection