 <!-- Brand Logo -->
    <a href="{{url ('/') }}" class="brand-link">
      <img src="{{ asset('images/logo/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>
     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/user/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/') }}" class="d-block text-center"> {{ Auth::user()->full_name }}</a>
          <small class="text-center text-white ml-5">
            {{ Auth::user()->hasrole('Administrador') ? 'Administrador' : 'Usuario' }}
          </small><br>
          <small class="text-white">
            Miembro desde el año {{ Auth::user()->created_at->format('Y') }}</small>
        </div>
      </div>
    <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-header">OPCIONES</li>


        <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Administración
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>


          <ul class="nav nav-treeview">
           <li class="nav-item has-treeview">
            @can('VerPermisos')
            <a href="#" class="nav-link active">
              <i class="nav-icon material-icons">format_list_bulleted</i>
              <p>
                Permisos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              @foreach ($roles as $role)

              <li class="nav-item">
                <a href="/permission/{{ $role->name }}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>{{ $role->name }}</p>
                </a>
              </li>
             @endforeach
          </li>
        </ul>
       @endcan
        </ul>
        <ul class="nav nav-treeview">
           <li class="nav-item has-treeview">
             @can('VerUsuario')
            <a href="#" class="nav-link active">
              <i class="nav-icon material-icons">person</i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/user" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Mostrar datos</p>
                </a>
              </li>

            @can('RegistrarUsuario')
               <li class="nav-item">
                <a href="/user/create" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Crear usuario</p>
                </a>
              </li>
            @endcan
          </li>
          @endcan
        </ul>
        </li>
        @can('VerRol')
          <li class="nav-item has-treeview">

            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-lock nav-icon"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('CrearRol')
              <li class="nav-item">
                <a href="/roles/create" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Agregar rol</p>
                </a>
              </li>
            @endcan

               <li class="nav-item">
                <a href="/roles" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Vista general</p>
                </a>
              </li>

            </ul>
          </li>
          @endcan
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-sign-in-alt nav-icon"></i>
              <p>
                Logins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="/logins" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Vista general</p>
                </a>
              </li>
            </ul>
          </li>
          
          
      
          
           </ul>
        </ul>


      </li>

       </li>
    </ul>
</nav>

    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
