<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
  <div class="row">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" style="font-family: fantasy;" href="#">Cadastro<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="font-family: fantasy;" href="#">Clientes<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="font-family: fantasy;" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-1">
        <!-- coluna vazia esquerda -->
      </div>
      <div class="col-md-10 mt-3">
        <p> Ola, {{Auth::user()->name}}</p>
        @if (session()->has('mensagem'))
          <div class="alert alert-danger">{{ session('mensagem') }}</div>
          {{ session()->forget(['mensagem']) }}
        @endif
        @yield('conteudo')
      </div>
      <div class="col-md-1">
        <!-- coluna vazia direita -->
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>