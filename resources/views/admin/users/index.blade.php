@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-users"></i> Gerenciamento de Usuários</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Listar usuários</li>
          </ol>
        </div>
      </div>
      <hr>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <table class="table datatable table-bordered table-striped">
            <thead class="bg-dark">
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Status</th>
                <th class="text-center">Gerenciar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->profile }}</td>
                <td>{{ $user->status }}</td>
                <td class="text-center">
                  <a href="{{ route('users-edit', [$user->id]) }}" class="btn btn-primary btn-sm" title="Editar">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <button class="btn btn-table btn-danger btn-sm" onclick="confirmation('form_{{ $user->id }}');"
                    title="Excluir"><i class="fa fa-trash"></i>
                  </button>
                  <form method="post" action="{{ route('users-destroy', [$user->id]) }}" id="form_{{ $user->id }}">
                    {{ csrf_field() }}
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/datatables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/datatables.init.js') }}"></script>
@endpush

@endsection