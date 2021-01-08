    @extends('layouts.admin')

    @section('title', 'Roles')
    @section('page_title', 'Roles')
    @section('page_subtitle', 'Listado')

    @section('breadcrumb')
        @parent
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('user') }}">usuarios</a></li>
        <li class="active">Listado</li>
    @endsection

    @section('content')
     <div class="container">
        @can('CrearRol')
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">

                <a href="{{ url('roles/create') }}" class="btn text-white  blue darken-4 "><i class="fa fa-plus-square"></i> Ingresar</a>


                </div>
            </div>
            </div>
             @endcan
        <br>
        <div class="card card-danger ">
          <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h3 class="card-title">Listado de roles</h3>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                    <th>Nombre del rol</th>
                    <th>Estado del rol</th>
                    <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                    <td>{{ $role->name }}</td>
                     <td><span class="badge fa-1x  elevation-2 text-white fa-1x {{ $role->status_id ? 'green' : 'red' }}">{{ $role->display_status }}</span></td>
                     <td>

                        @can('EditarRol')
                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-round blue darken-4 elevation-3" title="Editar Rol">
                            <i class="material-icons text-white">edit</i>
                        </a>
                         @endcan


                    </td>
                     </tr>
                    @endforeach
                    </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>

</div>
<div class="modal fade" id="confirm-delete" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea eliminar este
                        registro?</p>
                    <p class="nombre"></p>
                </div>
                <div class="modal-footer">
                    <form class="form-inline form-delete"
                          role="form"
                          method="POST"
                          action="">
                        {!! method_field('DELETE') !!}
                        {!! csrf_field() !!}
                        <button type="button"
                                class="btn btn-default"
                                data-dismiss="modal">Cancelar
                        </button>

                            <button id="delete-btn"
                                    class="btn btn-danger"
                                    title="Eliminar">Eliminar
                            </button>

                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection
