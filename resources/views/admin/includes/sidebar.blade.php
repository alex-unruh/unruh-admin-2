<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin-home') }}" class="brand-link">
    <img src="{{ asset('admin/img/head.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">UNRUH ADMIN</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (auth()->user()->photo)
          <img src="{{ asset('admin/uploads/medium') }}/{{ auth()->user()->photo }}"
            class="img-circle elevation-2 img-user-small" alt="User Image">
        @else
          <img src="{{ asset('admin/img/user.jpg') }}" class="img-circle elevation-2 img-user-small" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin-home') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuários
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('users-create') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('users') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Gerenciar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Categorias
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('categories-create') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Gerenciar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Galerias
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('galleries-create') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('galleries') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Gerenciar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Posts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('posts-create') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('posts') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Gerenciar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ asset('admin/plugins/filemanager/dialog.php?type=0') }}" class="nav-link fancy">
            <i class="nav-icon fas fa-photo-video"></i>
            <p>Mídia</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('config-edit') }}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Configurações</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-eye"></i>
            <p>
              Visualizar Site
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/" target="_blank" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Home</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
