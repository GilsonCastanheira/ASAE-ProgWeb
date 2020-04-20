@extends('template_venda')
@section('conteudo')
<h1 class="display-4">Venda #{{$venda->id}}</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID Item</th> 
        <th>Nome</th> 
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Valor Unitário</th> 
        <th>Subtotal</th> 
        <th>Data</th>
        <th>Operações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($venda->$produtos as $p)
      <tr>
        <td>{{ $p->pivot->id }}</td>
        <td>{{ $p->nome }}</td>
        <td>{{ $p->descricao }}</td>
        <td>{{ $p->pivot->quantidade}}</td>
        <td>{{ $p->preco }}</td>
        <td>{{ $p->pivot->subtotal }}</td>
        <td>{{ $p->pivot->created_at}}</td>
        <td><a class="btn btn-info" href="#">Itens</a></td>

      </tr>
      @endForeach
    </tbody>
  </table>

@endsection