@extends('layouts.app')
@section('title', 'Clases')
@section('content')
	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Maestros
        <small>Lista de Maestros</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Maestros</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="clearfix no-border">
        <button class="btn btn-info" data-toggle="modal" data-target=".example-modal-new">
            <i class="fa fa-plus"></i> Nuevo Maestro
        </button><br>
    </div>
	<div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Maestros</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">&nbsp;</th>
                    <th class="text-center">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($maestros as $maestro)
                    <tr>
                        <td class="text-center">{{ $maestro->id }}</td>
                        <td class="text-center" dat-title="Foto">{{ $maestro->photo }}</td>
                        <td class="text-center" dat-title="Nombre">{{ strtoupper($maestro->name ) }}</td>
                        <td class="text-center" dat-title="Apellido">{{ strtoupper($maestro->surname ) }}</td>
                        <td class="text-center" dat-title="Email">{{ $maestro->email }} </td>
                        <td class="text-center" dat-title="Teléfono">{{ $maestro->phone }} </td>
                        <td class="text-center" dat-title="Opciones">options</td>
                        <td class="text-center">
                            <a title="Editar" class="btn btn-info btn-sm btn-raised btnUpdateTeacher" data-toggle="modal" data-target=".example-modal-update" type="button" id="{{ $maestro->id }}">
                                    <i class="fa fa-btn fa-pencil"></i>
                            </a>
                        </td>
                      </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>


<div class="modal fade example-modal-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('newTeacher') }}" method="POST">
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Nuev@ Maestr@</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellido(s):</label>
                        <input type="text" class="form-control datepicker" id="surname" name="surname" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="correo@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="983 000 11 22">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="phone" name="password" placeholder="* * * * * * *">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnClose" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade example-modal-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('teacher') }}" method="POST">
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Editar Datos de Maestr@</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="editname">Nombre:</label>
                        <input type="hidden" name="teacher" id="techer">
                        <input type="text" class="form-control" id="editname" name="editname" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="editsurname">Apellido(s):</label>
                        <input type="text" class="form-control" id="editsurname" name="editsurname" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="editemail">Email:</label>
                        <input type="email" class="form-control" id="editemail" name="editemail" placeholder="correo@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="editphone">Teléfono:</label>
                        <input type="text" class="form-control" id="editphone" name="editphone" placeholder="983 000 11 22">
                    </div>
                    <div class="form-group">
                        <label for="editpassword">Contraseña:</label>
                        <input type="password" class="form-control" id="phone" name="password" placeholder="* * * * * * *">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnClose" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade example-modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ url('delete_task')}}" method="POST">
                <div class="modal-header modal-delete">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Eliminar tarea?</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="deletetasknum" name="deletetasknum">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnDeleteTask">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script src="js/teacher.js"></script>
@stop

@endsection
