@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><i class="fa fa-edit"></i> Gerenciamento de Posts</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('posts') }}">Posts</a></li>
						<li class="breadcrumb-item active">Cadastrar</li>
					</ol>
				</div>
			</div>
			<hr>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">

			<form role="form" action="{{ route('posts-store') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" id="assets" value="{{ config('app.asset_url') }}">
				<input type="hidden" id="url" value="{{ config('app.url') }}">

				<div class="row">
					<div class="col-md-9">
						<div class="card">
							<div class="card-header bg-dark">
								<h3 class="card-title">Cadastrar Post</h3>
							</div>

							<div class="card-body">
								<div class="row">

									{{-- title --}}
									<div class="form-group col-md-12">
										<label for="title">Título</label>
										<input type="text" class="form-control @error('title') is-invalid @enderror" title="title"
											id="title" name="title" value="{{ old('title') }}" required>
										<div class="invalid-feedback">{{ $errors->first('title') }}</div>
									</div>
									{{-- /title --}}

									{{-- slug --}}
									<div class="form-group col-md-12">
										<label for="slug">Slug</label>
										<input type="text" class="form-control @error('slug') is-invalid @enderror" title="slug" id="slug"
											name="slug" value="{{ old('slug') }}" required readonly>
										<div class="invalid-feedback">{{ $errors->first('slug') }}</div>
									</div>
									{{-- /slug --}}

									{{-- Excerpt --}}
									<div class="form-group col-md-12">
										<label for="excerpt">Resumo</label>
										<textarea name="excerpt"
											class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>
										<div class="invalid-feedback">{{ $errors->first('excerpt') }}</div>
									</div>
									{{-- /Excerpt --}}

									{{-- Meta description --}}
									<div class="form-group col-md-12">
										<label for="meta_description">Meta descrição</label>
										<input type="text" class="form-control @error('meta_description') is-invalid @enderror"
											id="meta_description" name="meta_description" value="{{ old('meta_description') }}">
										<div class="invalid-feedback">{{ $errors->first('meta_description') }}</div>
									</div>
									{{-- /Meta description --}}

									{{-- Content --}}
									<div class="form-group col-md-12">
										<label for="excerpt">Conteúdo</label>
										<textarea name="content" id="editor"
											class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
										<div class="invalid-feedback">{{ $errors->first('content') }}</div>
									</div>
									{{-- /Content --}}

								</div>
							</div>
						</div>

						{{-- Submit --}}
						<button type="submit" class="btn bg-gradient-success">Cadastrar</button>
						<a href="{{ route('posts') }}" class="btn bg-gradient-danger">Cancelar</a>
						{{-- /Submit --}}
					</div>

					<div class="col-md-3">
						<div class="card">
							<div class="card-header bg-dark">
								<div class="col-md-6">
									<h3 class="card-title">Imagem</h3>
								</div>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-12 text-center">
										<input type="hidden" title="image" id="image" name="image" value="{{ old('image') }}">
										@if(old('image'))
										<img src="{{ asset("admin/uploads/medium") }}/{{ old('image') }}" class="img-thumbnail" style="width:100%"
											id="prevImg" />
										@else
										<img src="{{ asset('admin/img/no-image.png') }}" class="img-thumbnail" id="prevImg" style="width:100%" />
										@endif
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-2 text-right">
										<a href="{{ asset('admin/plugins/filemanager/dialog.php?type=1&field_id=image&relative_url=1') }}"
											class="btn btn-success fancy btn-sm" title="Selecionar Imagem"><i class="fa fa-check"></i>
											Selecionar
										</a>
										<a href="#" class="btn btn-danger btn-sm" onclick="remover_img();return false;"
											title="Remover Imagem">
											<i class="fa fa-trash"></i> Remover
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header bg-dark">
								<div class="col-md-6">
									<h3 class="card-title">Galeria</h3>
								</div>
							</div>

							<div class="card-body">
								<div class="row">
									{{-- Galeria --}}
									<div class="form-group col-md-12 mt-3">
										<div class="form-group">
											<select class="form-control" name="gallery_id">
                                                <option value="">Nenhuma</option>
                                                @if($errors->any() && old('gallery_id'))
                                                <option value="{{ old('gallery_id') }}" selected>
                                                    {{ $galleries->where('id', old('gallery_id'))->first()->name }}
                                                </option>
                                                @endif
                                                @foreach($galleries as $gallery)
                                                @if($gallery->id != old('gallery_id'))
                                                <option value="{{ $gallery->id }}">{{ $gallery->name }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
										</div>
									</div>
									{{-- /Email --}}
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header bg-dark">
								<div class="col-md-6">
									<h3 class="card-title">Categorias</h3>
								</div>
							</div>

							<div class="card-body">
								<div class="row">
									@foreach($categories as $category)
									<div class="col-md-12">
										<div class="custom-control custom-checkbox mb-2">
											<input type="checkbox" class="custom-control-input" name="categories[]" id="{{ $category->name }}"
												value="{{ $category->id }}" @if(collect(old('categories'))->contains($category->id)) checked
											@endif>
											<label class="custom-control-label" for="{{ $category->name }}">{{ $category->name }}</label>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>

				</div>
			</form>
		</div>
	</section>
</div>

<div class="clearfix"></div><br>

@push('scripts')
<script type="text/javascript" src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/pages/posts.js') }}"></script>
@endpush

@endsection