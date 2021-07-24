@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><i class="fa fa-image"></i> Criar Nova Galeria</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
						<li class="breadcrumb-item active">Cria galeria</li>
					</ol>
				</div>
			</div>
			<hr>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			@if($errors->any())
			<div class="col-md-12">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					@foreach($errors->all() as $error)
					{{ $error }}<br>
					@endforeach
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			@endif

			<form role="form" action="{{ route('galleries-store') }}" method="POST">
				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-lg-3 col-md-4">
						<label for="name">Título da galeria</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>
					<div class="form-group col-lg-3 col-md-4">
						<label for="slug">Slug</label>
						<input type="text" name="slug" id="slug" class="form-control" required readonly>
					</div>

					<div class="col-md-4 mt-4">
						<a href="{{ asset('admin/plugins/filemanager/dialog.php?type=1&field_id=img_callback&relative_url=1') }}"
							class="btn btn-primary fancy" id="adicionar">
							<i class="fa fa-plus"></i> Adicionar Imagens
						</a>
						<button type="submit" class="btn btn-success ml-1" id="btn_submit"><i class="fa fa-check"></i> Concluir e
							Salvar</button>
					</div>
				</div>
				<input type="hidden" id="assets" value="{{ config('app.asset_url') }}">
				<input type="hidden" id="url" value="{{ config('app.url') }}">
				<input type="hidden" id="img_callback">
				<input type="hidden" id="gallery_index" value="0">
				<div class="row" id="row_containers"></div>

			</form>
		</div>
	</section>
</div>

@push('scripts')
<script src="{{ asset('admin/js/pages/galleries.js') }}"></script>
@endpush

@endsection