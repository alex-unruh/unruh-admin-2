@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-image"></i> Gerenciamento de Galerias</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Listar galerias</li>
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
                <th>Id</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Qtde. Imagens</th>
                <th class="text-center">Gerenciar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($galleries as $gallery)
              <tr>
                <td>{{ $gallery->id }}</td>
                <td>{{ $gallery->name }}</td>
                <td>{{ $gallery->slug }}</td>
                <td>{{ $gallery->images->count() }}</td>
                <td class="text-center">
                  <a href="{{ route('galleries-edit', [$gallery->id]) }}" class="btn btn-primary btn-sm"
                    title="Editar">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <button class="btn btn-table btn-danger btn-sm" onclick="confirmation('form_{{ $gallery->id }}');"
                    title="Excluir"><i class="fa fa-trash"></i>
                  </button>
                  <form method="post" action="{{ route('galleries-destroy', [$gallery->id]) }}"
                    id="form_{{ $gallery->id }}">
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