@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fa fa-cog"></i> Gerenciamento de Configurações</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Editar configurações</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <form role="form" action="{{ route('config-update') }}" method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-9 col-md-7">
                        <div class="card custom-card">
                            <div class="card-header bg-dark">
                                <h3 class="card-title">Editar configurações</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="titulo">Título do site</label>
                                        <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                            name="titulo" value="{{ old('titulo', $titulo ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('titulo') }}</div>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="meta_descricao">Meta Descrição</label>
                                        <input type="text"
                                            class="form-control @error('meta_descricao') is-invalid @enderror"
                                            name="meta_descricao"
                                            value="{{ old('meta_descricao', $meta_descricao ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('meta_descricao') }}</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="telefone">Telefone Fixo</label>
                                        <input type="text"
                                            class="form-control tel @error('telefone') is-invalid @enderror"
                                            name="telefone" value="{{ old('telefone', $telefone ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('telefone') }}</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="whatsapp">Celular/Whatsapp</label>
                                        <input type="text"
                                            class="form-control cel @error('whatsapp') is-invalid @enderror"
                                            name="whatsapp" value="{{ old('whatsapp', $whatsapp ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('whatsapp') }}</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', $email ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook" value="{{ old('facebook', $facebook ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                            name="instagram" value="{{ old('instagram', $instagram ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('instagram') }}</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                            name="twitter" value="{{ old('twitter', $twitter ?? '') }}">
                                        <div class="invalid-feedback">{{ $errors->first('twitter') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn bg-gradient-success">Atualizar</button>
                        {{-- /Submit --}}
                    </div>

                    <div class="col-lg-3 col-md-5">
                        <div class="card custom-card">
                            <div class="card-header bg-dark">
                                <div class="col-md-6">
                                    <h3 class="card-title">Imagem Default do Site</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" name="imagem" id="image"
                                            value="{{ old('imagem', $imagem ?? '') }}">
                                        @if(old('imagem', $imagem ?? ''))
                                        <img src="{{ asset("admin/uploads/small") }}/{{ old('imagem', $imagem) }}"
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

<script src="{{ asset('admin/js/jquery.mask.min.js') }}"></script>

<script>
    $(".tel").mask('(00) 0000-0000');
    $(".cel").mask('(00) 00000-0000');

    function responsive_filemanager_callback(field_id) {
        var src = $("#" + field_id).val();
        $("#prevImg").attr('src', '{!! asset("admin/uploads/medium") !!}' + '/' + src);
    }

    function remover_img() {
        var src = '{!! asset("admin/img/no-image.png") !!}';
        $("#image").val('');
        $("#prevImg").attr('src', src);
    }
</script>
@endpush

@endsection