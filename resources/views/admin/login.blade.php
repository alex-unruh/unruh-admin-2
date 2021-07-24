<!doctype html>
<html lang="pt_BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login - Unruh Admin</title>
  <link href="{{ asset('admin/css/adminlte.min.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>

<body class="text-center login-body">
  <form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <img class="mb-4" src="{{ asset('admin/img/logo.png') }}">
    <h1 class="h3 mb-3 font-weight-normal">Bem vindo!</h1>

    {{-- Email --}}
    <label for="email" class="sr-only">Usuário</label>
    <input type="text" name="email" id="email" class="form-control mb-1" placeholder="Usuário" required autofocus>

    {{-- Password --}}
    <label for="password" class="sr-only">Senha</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>

    {{-- Submit --}}
    <button class="btn btn-lg btn-theme btn-block" type="submit">LOGIN</button>

    <p class="mt-5 mb-3 text-muted">&copy; Unruh Solutions {{ date('Y') }}
      <br>Todos os direitos reservados<br>
      Unruh Admin Versão 1.0.0 </p>
  </form>

  <script type="text/javascript" src="{{ asset('admin/js/sweet-alert.min.js') }}"></script>
  <script>
    function message(msg, style) {
      swal({
        text: msg,
        type: style,
        confirmButtonClass: 'btn btn-info'
      });
    }
  </script>

  @if(session('error'))
  <script>
    message('{{ session("error") }}',  'error');
  </script>
  @endif

</body>

</html>