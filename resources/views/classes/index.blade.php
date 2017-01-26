@extends('layouts.app')
@section('title', 'Clases')
@section('content')
	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clases
        <small>Lista de clases</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Clases</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="clearfix no-border">
        <button class="btn btn-info" data-toggle="modal" data-target=".example-modal-new">
            <i class="fa fa-plus"></i> Nueva Clase
        </button><br>
    </div>
	<div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Clases del Periodo</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Clase</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de Clausura</th>
                    <th>Dias</th>
                    <th>Horario</th>
                    <th>Maestro</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Misc</td>
                    <td>IE Mobile</td>
                    <td>1A</td>
                    <td>Windows Mobile 6</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Misc</td>
                    <td>PSP browser</td>
                    <td>1A</td>
                    <td>PSP</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>1A</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                  </tr>
                </tbody>
            </table>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group has-warning">
      <label class="control-label" for="inputWarning1">Input with warning</label>
      <input type="text" class="form-control" id="inputWarning1">
    </div>

</section>

@endsection

<div class="modal fade example-modal-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('newTask') }}" method="POST">
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Agregar Nueva Tarea</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="course">Tarea:</label>
                      <input type="text" class="form-control" id="task" name="task" placeholder="Descripción de la tarea">
                    </div>
                    <div class="form-group">
                      <label for="description">Para:</label>
                      <input type="text" class="form-control datepicker" id="datetodo" name="datetodo" placeholder="Para cuando">
                    </div>
                    <div class="form-group">
                        <label for="description">Prioridad:</label>
                        <select name="priority" class="form-control" id="priority" required>
                            <option></option>}
                            <option value="0">Normal</option>
                            <option value="1">Importante</option>
                            <option value="2">Urgente</option>
                            <option value="3">Informativo</option>
                        </select>
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

<div class="modal fade example-modal-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('task') }}" method="POST">
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Editar Tarea</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="course">Tarea:</label>
                      <input type="hidden" class="form-control" id="edittasknum" name="edittasknum">
                      <input type="text" class="form-control" id="edittask" name="edittask">
                    </div>
                    <div class="form-group">
                      <label for="description">Para:</label>
                      <input type="text" class="form-control datepick" id="editdatetodo" name="editdatetodo">
                    </div>
                    <div class="form-group">
                        <label for="description">Prioridad:</label>
                        <select name="editpriority" class="form-control" id="editpriority" required>
                            <option></option>}
                            <option value="0">Normal</option>
                            <option value="1">Importante</option>
                            <option value="2">Urgente</option>
                            <option value="3">Informativo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCloseEdit" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
