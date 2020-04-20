@extends('template')

@section('conteudo')
 <h1 class="display-4">Cadastro de Itens </h1>
    <form method="post" action="{{route ('vendas_item_add' ,['id' => $venda->id]) }}">
	@csrf
	<select name="id_produto" class="form-control">
		@foreach ($produtos as $p)
		<option value="{{ $p->id }}">{{ $p->nome }}</option>
		@endforeach
	</select>
	<input type="number" name="quantidade" class="form-control" min="0" step="0.01">
	<input type="submit" class="btn btn-success" value="Cadastrar">
</form>
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