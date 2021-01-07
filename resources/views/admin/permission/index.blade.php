@extends('layouts.admin')

@section('title', 'Permisos')
@section('page_title', 'Permisos')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">permisos</li>
@endsection

@section('content')


      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="">
                <h2 class="title mt-2 mb-2 text-center">Permisos del rol <b>{{ $role->name }}</b></h2>
              </div>
              <div class="card-body table-responsive table-hover">
                <form role="form" id="main-form">
                  <input type="hidden" id="_url" value="{{ url('permission', $role->name) }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <table class="table table-responsive">
                    <tr>
                      <h3>{{ $role->name }}</h3>
                    </tr>
                    <tr>
                      <td>
                        Ver usuarios<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerUsuario" {{ $role->hasPermissionTo('VerUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarUsuario" {{ $role->hasPermissionTo('RegistrarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarUsuario" {{ $role->hasPermissionTo('EditarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarUsuario" {{ $role->hasPermissionTo('EliminarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Crear Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearRol" {{ $role->hasPermissionTo('CrearRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Ver roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerRol" {{ $role->hasPermissionTo('VerRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Editar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarRol" {{ $role->hasPermissionTo('EditarRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Eliminar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarRol" {{ $role->hasPermissionTo('EliminarRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        Agregar pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearPago" {{ $role->hasPermissionTo('CrearPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerPago" {{ $role->hasPermissionTo('VerPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarPago" {{ $role->hasPermissionTo('EditarPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarPago" {{ $role->hasPermissionTo('EliminarPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver moneda</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerMoneda" {{ $role->hasPermissionTo('VerMoneda') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar moneda</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearMoneda" {{ $role->hasPermissionTo('CrearMoneda') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar moneda</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarMoneda" {{ $role->hasPermissionTo('EditarMoneda') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>


                      <td>
                        Eliminar moneda</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarMoneda" {{ $role->hasPermissionTo('EliminarMoneda') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        </tr>

                      <td>
                        Ver modalidad de pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerModalidadPago" {{ $role->hasPermissionTo('VerModalidadPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar modalidad de pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearModalidadPago" {{ $role->hasPermissionTo('CrearModalidadPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar modalidad de pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarModalidadPago" {{ $role->hasPermissionTo('EditarModalidadPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar modalidad de pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarModalidadPago" {{ $role->hasPermissionTo('EliminarModalidadPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Ver estado de pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerEstadoPago" {{ $role->hasPermissionTo('VerEstadoPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar estado de pagos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearEstadoPago" {{ $role->hasPermissionTo('CrearEstadoPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>

                       <td>
                        Editar estado de pago</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarEstadoPago" {{ $role->hasPermissionTo('EditarEstadoPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar estado de pago</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarEstadoPago" {{ $role->hasPermissionTo('EliminarEstadoPago') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <tr>

                       <td>
                        Ver saldo disponible</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerSaldoDisponible" {{ $role->hasPermissionTo('VerSaldoDisponible') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar saldo disponible</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearSaldoDisponible" {{ $role->hasPermissionTo('CrearSaldoDisponible') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar saldo disponible</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarSaldoDisponible" {{ $role->hasPermissionTo('EditarSaldoDisponible') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar saldo disponible</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarSaldoDisponible" {{ $role->hasPermissionTo('EliminarSaldoDisponible') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>

                       <td>
                        Ver fuente de financiamiento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerFuenteFinanciamiento" {{ $role->hasPermissionTo('VerFuenteFinanciamiento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>

                         <td>
                        Crear  fuente de financiamiento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearFuenteFinanciamiento" {{ $role->hasPermissionTo('CrearFuenteFinanciamiento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar  fuente de financiamiento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarFuenteFinanciamiento" {{ $role->hasPermissionTo('EditarFuenteFinanciamiento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar  fuente de financiamiento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarFuenteFinanciamiento" {{ $role->hasPermissionTo('EliminarFuenteFinanciamiento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <tr>


                      <td>
                        Ver rubros</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerRubros" {{ $role->hasPermissionTo('VerRubros') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar rubros</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearRubros" {{ $role->hasPermissionTo('CrearRubros') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar rubros</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarRubros" {{ $role->hasPermissionTo('EditarRubros') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar rubros</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarRubros" {{ $role->hasPermissionTo('EliminarRubros') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerPermisos" {{ $role->hasPermissionTo('VerPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearPermisos" {{ $role->hasPermissionTo('CrearPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarPermisos" {{ $role->hasPermissionTo('EditarPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarPermisos" {{ $role->hasPermissionTo('EliminarPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    {{--
                      <tr>
                       <td>
                          Agregar facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarFacturas" {{ $role->hasPermissionTo('AgregarFacturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarFacturas" {{ $role->hasPermissionTo('EditarFacturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar facturas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarFacturas" {{ $role->hasPermissionTo('EliminarFacturas') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerProductos" {{ $role->hasPermissionTo('VerProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarProductos" {{ $role->hasPermissionTo('AgregarProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarProductos" {{ $role->hasPermissionTo('EditarProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarProductos" {{ $role->hasPermissionTo('EliminarProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      </tr>
                      <tr>
                         <td>
                        Historial de medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerMovimientos" {{ $role->hasPermissionTo('VerMovimientos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar historial de medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarMovimientos" {{ $role->hasPermissionTo('AgregarMovimientos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar historial de medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarMovimientos" {{ $role->hasPermissionTo('EditarMovimientos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar historial de medicinas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarMovimientos" {{ $role->hasPermissionTo('EliminarMovimientos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerProveedores" {{ $role->hasPermissionTo('VerProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarProveedores" {{ $role->hasPermissionTo('AgregarProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarProveedores" {{ $role->hasPermissionTo('EditarProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      </tr>
                      <tr>
                         <td>
                        Eliminar proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarProveedores" {{ $role->hasPermissionTo('EliminarProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerEmpleados" {{ $role->hasPermissionTo('VerEmpleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarEmpleados" {{ $role->hasPermissionTo('AgregarEmpleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarEmpleados" {{ $role->hasPermissionTo('EditarEmpleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar empleados</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarEmpleados" {{ $role->hasPermissionTo('EliminarEmpleados') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver apertura de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerAperturaDeCaja" {{ $role->hasPermissionTo('VerAperturaDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar apertura de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarAperturaDeCaja" {{ $role->hasPermissionTo('AgregarAperturaDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      </tr>
                      <tr>
                         <td>
                        Editar apertura de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarAperturaDeCaja" {{ $role->hasPermissionTo('EditarAperturaDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar apertura de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarAperturaDeCaja" {{ $role->hasPermissionTo('EliminarAperturaDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver cierre de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerCierreDeCaja" {{ $role->hasPermissionTo('VerCierreDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar cierre de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarCierreDeCaja" {{ $role->hasPermissionTo('AgregarCierreDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar cierre de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarCierreDeCaja" {{ $role->hasPermissionTo('EditarCierreDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar cierre de caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarCierreDeCaja" {{ $role->hasPermissionTo('EliminarCierreDeCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerGastos" {{ $role->hasPermissionTo('VerGastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      </tr>
                      <tr>
                         <td>
                        Agregar gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarGastos" {{ $role->hasPermissionTo('AgregarGastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarGastos" {{ $role->hasPermissionTo('EditarGastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar gastos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarGastos" {{ $role->hasPermissionTo('EliminarGastos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver tasa del dólar</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerTasaDelDolar" {{ $role->hasPermissionTo('VerTasaDelDolar') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar tasa del dólar</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarTasaDelDolar" {{ $role->hasPermissionTo('EditarTasaDelDolar') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Agregar tasa del dólar</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AgregarTasaDelDolar" {{ $role->hasPermissionTo('AgregarTasaDelDolar') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar tasa del dólar</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarTasaDelDolar" {{ $role->hasPermissionTo('EliminarTasaDelDolar') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>  --}}
                      </tr>
                    </tr>
                  </table><br>

                  
                    <button type="submit" class="btn blue darken-4 text-white ajax" id="submit">
                      <i id="ajax-icon" class="fa fa-edit"></i> Editar
                    </button>
                  </div>
                </form>
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
  <script src="{{ asset('js/admin/permission/index.js') }}"></script>
@endpush
