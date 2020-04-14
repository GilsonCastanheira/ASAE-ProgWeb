@extends('template')

@section('conteudo')

<form method="post" action="{{ route('adicionar_usuario') }}">
    @csrf
    <div class="form-group"><input type="text" name="nome" placeholder="Nome"></div>
    <div class="form-group"><input type="text" name="login" placeholder="Login"></div>
    <div class="form-group"><input type="password" name="senha" placeholder="Senha"></div>
    <div class="form-group"><input type="submit" class="btn btn-primary" value="Cadastrar"></div>

</form>
@endsection