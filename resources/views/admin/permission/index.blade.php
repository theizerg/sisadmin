@extends('layouts.admin')

@section('title', 'Permisos')
@section('page_title', 'Permisos')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">pastor</a></li>
    <li class="active">permisos</li>
@endsection

@section('content')

    <section class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Permisos del rol usuario</h2>
                <div class="card-tools"></div>
              </div>
              <div class="card-body table-responsive table-striped">
                <form role="form" id="main-form">
                  <input type="hidden" id="_url" value="{{ url('permission', ['user']) }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <table class="table table-responsive">
                   
                    <tr>
                      <td>
                        Ver pastor<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_pastor" {{ $role->hasPermissionTo('view_pastor') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar pastor</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="add_pastor" {{ $role->hasPermissionTo('add_pastor') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar pastor</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit_pastor" {{ $role->hasPermissionTo('edit_pastor') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar pastor</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete_pastor" {{ $role->hasPermissionTo('delete_pastor') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver logins</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="view_logins" {{ $role->hasPermissionTo('view_logins') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Asignar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="assign_permissions" {{ $role->hasPermissionTo('assign_permissions') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                  </table>
                  <div class="card-footer clearfix"></div>
                   <div class="form-group pading">
                     <label for="name">Contraseña actual</label>
                     <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Contraseña actual">
                     <span class="missing_alert text-danger" id="current_password_alert"></span>
                    </div>
                    <button type="submit" class="btn btn-primary ajax" id="submit">
                      <i id="ajax-icon" class="fa fa-edit"></i> Editar
                    </button>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </section>


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
  <script src="{{ asset('js/admin/permission/index.js') }}"></script>
@endpush
