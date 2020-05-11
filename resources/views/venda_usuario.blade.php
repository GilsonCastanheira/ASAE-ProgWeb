@extends('template')

@section('conteudo')
<h1>Cadastro de venda</h1>
<form method="post" action="{{ route('venda_add') }}">
  @csrf
  <select name="id_usuario" class="form-control">
    @foreach ($usuario as $u)
    <option value="{{ $u->id }}">{{ $u->nome }}</option>
    @endforeach
  </select>
  <input type="submit" class="btn btn-success" value="Cadastrar">
</form>
@endsection