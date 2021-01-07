@extends('layouts.admin')

@section('title', 'Roles')
@section('page_title', 'Roles')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">Roles</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')
 
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('CrearRol')
          <a href="{{ url('roles') }}" class="btn btn-danger"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
          @endcan
          @can('CrearRol')
          <a href="{{ url('roles/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
 
        <div class="card card-danger card-outline">

           {{ Form::open(array('url' => 'roles')) }}       
        
            <div class="card-body">
              @include('admin.roles.partials.form')
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger ajax" id="submit">
                <i id="ajax-icon" class="fas fa-save"></i> Ingresar
              </button>
            </div>
           {{ Form::close() }}
        </div>
      </div>
    </div>


@endsection
