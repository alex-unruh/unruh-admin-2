<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Unruh Admin | Gerenciador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" href="/assets/admin/img/head.png">

  {{-- Styles --}}
  <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
  <link rel="stylesheet" href="/assets/awesome/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="/assets/admin/plugins/fancybox/jquery.fancybox.min.css" />
  @stack('styles')
  <link rel="stylesheet" href="/assets/admin/css/custom.css">
  {{-- Styles --}}
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
  <div class="wrapper">

    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')

    @yield('content')

    @include('admin.includes.footer')
  </div>

  {{-- Scripts --}}
  <script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
  <script src="/assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="/assets/admin/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/admin/js/adminlte.min.js"></script>
  <script src="/assets/admin/plugins/fancybox/jquery.fancybox.min.js"></script>
  <script src="/assets/admin/js/sweet-alert.min.js"></script>
  @stack('scripts')
  <script src="/assets/admin/js/scripts.js"></script>
  {{-- Scripts --}}

  @component('admin.components.alerts')@endcomponent
</body>

</html>
