@extends('layouts.admin')

@section('content')

@push('page-navigation')
<li class="nav-item d-none d-sm-inline-block">
    <a href="#pageTodoList" class="nav-link">To do List</a>
</li>
@endpush

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" id="pageTop">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            {{-- Widgets --}}
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $all }}</h3>
                            <p>Total geral de visitas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $all_unique }}</h3>
                            <p>Total geral de visitantes únicos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $unique_today }}</h3>
                            <p>Visitantes únicos hoje</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Contatos recebidos pelo site</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            {{-- /Widgets --}}

            <div class="row">
                {{-- Gráficos --}}
                <div class="col-lg-9">
                    <div class="row">
                        {{-- Gráfico de Visitantes --}}
                        <section class="col-sm-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Visitantes
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link visits active" id="visits_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link visits" id="visits_month" data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link visits" id="visits_year" data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <div class="chart tab-pane active" id="bar_visits">
                                            <canvas id="visits" height="72"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Gráfico de Visitantes --}}
                    </div>

                    <div class="row">
                        {{-- Gráfico de vistas por Navegador --}}
                        <section class="col-sm-6 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Navegador
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link browser active" id="browser_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link browser" id="browser_month" data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link browser" id="browser_year" data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <div class="chart tab-pane active" id="browser">
                                            <canvas id="browser_ctx"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Gráfico de vistas por Navegador --}}

                        {{-- Gráfico de vistas por Plataforma --}}
                        <section class="col-sm-6 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Sistema Operacional
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link platform active" id="platform_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link platform" id="platform_month"
                                                    data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link platform" id="platform_year"
                                                    data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <div class="chart tab-pane active" id="platform">
                                            <canvas id="platform_ctx"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Gráfico de vistas por Plataforma --}}
                    </div>
                </div>
                {{-- /Gráficos --}}

                {{-- Listas --}}
                <div class="col-lg-3">
                    <div class="row">
                        {{-- Pàginas --}}
                        <section class="col-sm-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-list-alt mr-1"></i>
                                        Páginas
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link list active" id="list_uri_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_uri_month" data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_uri_year" data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <table class="table table-striped table-sm" id="table_uri">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Páginas --}}

                        {{-- Origem --}}
                        <section class="col-sm-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-list-alt mr-1"></i>
                                        Origem
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link list active" id="list_referer_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_referer_month"
                                                    data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_referer_year"
                                                    data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <table class="table table-striped table-sm" id="table_referer">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Origem --}}

                        {{-- Região --}}
                        <section class="col-sm-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-list-alt mr-1"></i>
                                        Região
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link list active" id="list_region_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_region_month"
                                                    data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_region_year" data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <table class="table table-striped table-sm" id="table_region">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /Região --}}

                        {{-- País --}}
                        <section class="col-sm-12 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-list-alt mr-1"></i>
                                        País
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link list active" id="list_country_today"
                                                    data-toggle="tab">Hoje</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_country_month"
                                                    data-toggle="tab">Mês</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list" id="list_country_year"
                                                    data-toggle="tab">Ano</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <table class="table table-striped table-sm" id="table_country">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- /País --}}
                    </div>
                </div>
            </div>
            {{-- /Listas --}}
        </div>
    </section>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
</script>
<script src="{{ asset('admin/js/pages/unruh-dashboard.js') }}"></script>
@endpush

@endsection