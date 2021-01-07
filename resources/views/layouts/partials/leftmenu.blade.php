<div class="sidebar " data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('SISADMIN') }}
    </a>
  </div>
  <ul class="nav navbar-nav">
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          <i class="material-icons">home</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">person</i>
          <p>{{ __('Usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link {{ active_check(['user']) }}" href="{{ url('user') }}">
                <i class="material-icons">content_paste</i>
                <span class="sidebar-normal">{{ __('Listado') }} </span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link {{ active_check(['user']) }}" href="{{ url('user/create') }}">
               <i class="material-icons">add</i>
                <span class="sidebar-normal">{{ __('Agregar') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelAdmin" aria-expanded="true">
          <i class="fas fa-cogs"></i>
          <p>{{ __('Administración') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelAdmin">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link {{ active_check(['permission']) }}" href="{{ url('permission') }}">
                <i class="mdi mdi-shield"></i>
                <span class="sidebar-normal">{{ __('Permisos') }} </span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link {{ active_check(['role']) }}" href="{{ url('roles') }}">
               <i class="mdi  mdi-security"></i>
                <span class="sidebar-normal">{{ __('Roles') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ active_check(['logins']) }}" href="{{ url('logins') }}">
               <i class="mdi  mdi-login"></i>
                <span class="sidebar-normal">{{ __('Logins') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
     
    </ul>
  </div>
</div>