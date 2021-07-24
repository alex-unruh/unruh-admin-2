@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-users"></i> Gerenciamento de Usuários</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
            <li class="breadcrumb-item active">Cadastrar usuário</li>
          </ol>
        </div>
      </div>
      <hr>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <form role="form" action="{{ route('users-store') }}" method="POST">
        {{ csrf_field() }}

        <div class="row">
          <div class="col-lg-9 col-md-7">
            <div class="card custom-card">
              <div class="card-header bg-dark">
                <h3 class="card-title">Cadastrar Usuário</h3>
              </div>

              <div class="card-body">
                <div class="row">

                  {{-- Name --}}
                  <div class="form-group col-md-6">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                      value="{{ old('name') }}" required>
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                  </div>
                  {{-- /Name --}}

                  {{-- Email --}}
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                      id="email" value="{{ old('email') }}" required>
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                  </div>
                  {{-- /Email --}}

                  {{-- Password --}}
                  <div class="form-group col-md-6">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                      id="password" value="{{ old('password') }}" required>
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                  </div>
                  {{-- /Password --}}

                  {{-- Password Confirmation --}}
                  <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirmar Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                  </div>
                  {{-- /Password Confirmation --}}

                  {{-- Status --}}
                  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                      @foreach($user_status as $status)
                      <option @if(old('status')==$status) selected @endif>{{ $status }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                  </div>
                  {{-- /Status --}}

                  {{-- Profile --}}
                  <div class="form-group col-md-6">
                    <label for="profile">Perfil</label>
                    <select name="profile" class="form-control @error('profile') is-invalid @enderror">
                      @foreach($profiles as $profile)
                      <option @if(old('profile')==$profile) selected @endif>{{ $profile }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('profile') }}</div>
                  </div>
                  {{-- /Profile --}}
                </div>
              </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn bg-gradient-success">Cadastrar</button>
            <a href="{{ route('users') }}" class="btn bg-gradient-danger">Cancelar</a>
            {{-- /Submit --}}
          </div>

          <div class="col-lg-3 col-md-5">
            <div class="card custom-card">
              <div class="card-header bg-dark">
                <div class="col-md-6">
                  <h3 class="card-title">Foto</h3>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <input type="hidden" name="photo" id="photo" value="{{ old('photo') }}">
                    @if(old('photo'))
                    <img src="{{ asset("admin/uploads/medium") }}/{{ old('photo') }}" class="img-thumbnail img-user"
                      id="prevImg" />
                    @else
                    <img src="{{ asset('admin/img/user.jpg') }}" class="img-thumbnail img-user" id="prevImg" />
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 text-right">
                <a href="{{ asset('admin/plugins/filemanager/dialog.php?type=1&field_id=photo&relative_url=1') }}"
                  class="btn btn-success fancy btn-sm" title="Selecionar Foto"><i class="fa fa-search"></i> Selecionar
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="remover_img();return false;" title="Remover Foto">
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
<script>
  function responsive_filemanager_callback(field_id) {
    var src = $("#" + field_id).val();
    $("#prevImg").attr('src', '{!! asset("admin/uploads/medium") !!}' + '/' + src);
  }

  function remover_img() {
    var src = '{!! asset("admin/img/user.jpg") !!}';
    $("#photo").val('');
    $("#prevImg").attr('src', src);
  }
</script>
@endpush

@endsection