@extends('template')

@section('conteudo')
<h1>Lista de Vendas</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID Venda</th>
			<th>Valor</th>
			<th>Data</th>
			<th>Operações</th>
		</tr>
	</thead>
	<tbody>
		@foreach($vendas as $v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->valor }}</td>
			<td>{{ $v->created_at }}</td>
			<td><a class="btn btn-info" href="{{ route('vendas_itens', ['id' => $v->id]) }}">Itens</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
<a class="btn btn-primary" href="{{ route('venda_cadastro') }}">Cadastrar nova</a>
@endsection