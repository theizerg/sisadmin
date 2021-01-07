@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">datos</li>
@endsection

@section('content')
<div class="container">
  <div class="card">
  <div class="col-sm-12">
    <div class="card-outline card-header">
      <h2 class="card-title">
        <i class="fa fa-user"></i> Datos de usuario
        <small class="pull-right">{{ $user->display_name }}</small>
      </h2>
    </div>

  <div class="card-body">
    <div class="row">
      <div class="col-sm-2">
        <strong>Nombre</strong><br>
          {{ $user->full_name }}
      </div>
      <div class="col-sm-2">
          <strong>Correo electrónico</strong>
          <br>
          {{ $user->email }}
      </div>
       <div class="col-sm-2">
          <strong>Usuario</strong>
          <br>
          {{ $user->username }}
        </div>
        <div class="col-sm-2">
            <strong>Estatus</strong><br>
            <span class="badge text-white {{ $user->status_id ? 'green' : 'red' }}">{{ $user->display_status }}</span>
          </div>
          <div class="col-sm-2">
              <strong>Tipo de usuario</strong><br>
             <b>{{ Auth::user()->hasrole('admin') ? 'Administrador' : 'Usuario' }}</b>
          </div>
      
     
          <div class="col-sm-2 ">
             <strong>Contraseña</strong><br>
                ********
              </div>
              <div class="col-sm-2 mt-4">
                <strong>Creado</strong>
                <br>
                  {{ $user->created_at }}
                </div>
                <div class="col-sm-2 mt-4">
                  <strong>Actualizado</strong><br>
                  {{ $user->updated_at }}
                </div>
                <div class="col-sm-2 mt-4">
                  <strong>Logins</strong><br>
                  <i class="fa fa-eye"></i> <a href="{{ url('logins', [$user->encode_id]) }}">logins</a>
                </div>
            </div>
            </div>
            <div class="row card-body  ">
            </div>
            <br>
            <br>
            <div class="card-footer">
              <div class="col-md-6">
                <div class="btn-group">
                 
                  <a href="{{ url('user', [Auth::user()->encode_id,'edit']) }}" class="btn blue darken-4 text-white"><i class="fa fa-edit"></i> Editar</a>
                  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
