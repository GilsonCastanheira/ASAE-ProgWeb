@extends('template')
@section('conteudo')
	<form method="POST" action="{{route('login')}}"> @csrf
		<input type="text" name="login" placeholder="Login">
		<input type="password" name="senha" placeholder="Senha">
		<input type="submit" value="Acessar">
	</form>
@endsection