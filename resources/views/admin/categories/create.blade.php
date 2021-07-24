@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fa fa-list"></i> Gerenciamento de Categorias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cadastrar categoria</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <form role="form" action="{{ route('categories-store') }}" method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-9 col-md-7">
                        <div class="card custom-card">
                            <div class="card-header bg-dark">
                                <h3 class="card-title">Cadastrar Categoria</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- Name --}}
                                    <div class="form-group col-md-4">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    </div>
                                    {{-- /Name --}}

                                    {{-- Email --}}
                                    <div class="form-group col-md-4">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" id="slug" value="{{ old('slug') }}" readonly>
                                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                                    </div>
                                    {{-- /Email --}}

                                    {{-- parent --}}
                                    <div class="form-group col-md-4">
                                        <label for="parent">Categoria mãe</label>
                                        <select name="parent"
                                            class="form-control @error('parent') is-invalid @enderror">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('parent')==$category->id)
                                                selected
                                                @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">{{ $errors->first('parent') }}</div>
                                    </div>
                                    {{-- /parent --}}

                                    {{-- Description --}}
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            name="description">{{ old('description') }}</textarea>
                                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    </div>
                                    {{-- /Description --}}

                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn bg-gradient-success">Cadastrar</button>
                        <a href="{{ route('categories') }}" class="btn bg-gradient-danger">Cancelar</a>
                        {{-- /Submit --}}
                    </div>

                    <div class="col-lg-3 col-md-5">
                        <div class="card custom-card">
                            <div class="card-header bg-dark">
                                <div class="col-md-6">
                                    <h3 class="card-title">Imagem</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" name="image" id="image" value="{{ old('image') }}">
                                        @if(old('image'))
                                        <img src="{{ asset("admin/uploads/medium") }}/{{ old('image') }}"
                                            class="img-thumbnail" style="width:100%" id="prevImg" />
                                        @else
                                        <img src="{{ asset('admin/img/no-image.png') }}" class="img-thumbnail"
                                            id="prevImg" style="width:100%" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ asset('admin/plugins/filemanager/dialog.php?type=1&field_id=image&relative_url=1') }}"
                                    class="btn btn-success fancy btn-sm" title="Selecionar Imagem"><i
                                        class="fa fa-search"></i> Selecionar
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="remover_img();return false;"
                                    title="Remover Imagem">
                                    <i class="fa fa-trash"></i> Remover
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@push('scripts')
<script src="{{ asset('admin/js/pages/categories.js') }}"></script>
@endpush

@endsection