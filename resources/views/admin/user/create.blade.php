@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          <a href="{{ url('user') }}" class="btn blue darken-4 text-white"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>         
          <a href="{{ url('user/create') }}" class="btn blue darken-4 text-white"><i class="fa fa-plus-square"></i> Ingresar</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
         <div class="card-header  outline-primary blue-gradient-dark text-white">
              <h3 class="card-title">Crear usuarios</h3>
             
            </div>
           {!!Form::open (['route'=>'user.store','id'=>'postulados_form'])!!}
            <div class="card-body">
              <div class="form-group mt-4">
                <label for="name">Nombres</label>
                <input class="form-control" id="name" name="name" >
                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
              <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input class="form-control" id="last_name" name="last_name" >
                <span class="missing_alert text-danger" id="last_name_alert"></span>
              </div>
              <div class="form-group">
                <label for="username">Usuario</label>
                <input class="form-control" id="username" name="username" >
                <span class="missing_alert text-danger" id="username_alert"></span>
              </div>
              <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input class="form-control" id="email" name="email" >
                <span class="missing_alert text-danger" id="email_alert"></span>
              </div>
              <div class="form-group">
                <label for="role">Tipo de usuario</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="role" value="Usuario" checked> Usuario&nbsp;&nbsp;
                    <input type="radio" name="role" value="Administrador"> Administrador
                   
                  </label>
                </div>
              </div>
              
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="missing_alert text-danger" id="password_alert"></span>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
              </div>
              <div class="form-group">
                <label for="status_id">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status_id" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status_id" value="2"> Deshabilitado
                  </label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn blue darken-4 text-white ajax" id="submit">
                <i id="ajax-icon" class="fa fa-save"></i> Ingresar
              </button>
             
            </div>
          {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script src="{{ asset('js/admin/user/create.js') }}"></script>
@endpush
