@extends('layouts.app')
@section('title', 'Home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>

    <section class="content">
        <div class="row">
            <section class="col-lg-8 connectedSortable">
              	<div class="box box-primary">
	                <div class="box-header">
	                  	<i class="glyphicon glyphicon-list-alt"></i>
	                  	<h3 class="box-title">To Do List</h3>
	                  	<div class="box-tools pull-right">
		                    <ul class="pagination pagination-sm inline">
		                      	<li><a href="#">&laquo;</a></li>
		                      	<li><a href="#">1</a></li>
		                      	<li><a href="#">2</a></li>
		                      	<li><a href="#">3</a></li>
		                      	<li><a href="#">&raquo;</a></li>
		                    </ul>
	                  	</div>
	                </div>
	                <div class="box-body">
	                	<div class="clearfix no-border">
		                  	<button class="btn btn-info" data-toggle="modal" data-target=".example-modal-new">
		                  		<i class="fa fa-plus"></i> Nuevo
		                  	</button><br>
		                </div>
	                  	<ul class="todo-list">
	                  	@foreach ($tasks as $task)
		                    <li>
		                      	<span class="handle">
			                        <i class="fa fa-ellipsis-v"></i>
			                        <i class="fa fa-ellipsis-v"></i>
		                      	</span>
		                      	<span class="text">{{ $task->task }}</span>
		                      	@if ($task->priority == 0)
		                      		<small class="label label-default pull-right">
				                    	<i class="fa fa-clock-o"></i> 2 mins
				                    </small>
			                    @endif
			                    @if ($task->priority == 1)
		                      		<small class="label label-warning pull-right">
				                    	<i class="fa fa-clock-o"></i> 2 mins
				                    </small>
			                    @endif
			                    @if ($task->priority == 2)
		                      		<small class="label label-danger pull-right">
				                    	<i class="fa fa-clock-o"></i> 2 mins
				                    </small>
			                    @endif
			                    @if ($task->priority == 3)
		                      		<small class="label label-info pull-right">
				                    	<i class="fa fa-clock-o"></i> 2 mins
				                    </small>
			                    @endif
		                      	
		                      	<div class="tools">
			                        <a class="fa fa-edit btnEdit" id="{{$task->id}}" data-toggle="modal" data-target=".example-modal-edit"></a>
			                        <a class="fa fa-trash-o btnDelete" id="{{$task->id}}" data-toggle="modal" data-target=".example-modal-delete"></a>
		                      	</div>
		                    </li>
		                @endforeach
	                  	</ul>
	                </div>
              	</div>
            </section>

            <section class="col-lg-4 connectedSortable">
              	<div class="box box-solid bg-green-gradient">
	                <div class="box-header">
	                  	<i class="fa fa-calendar"></i>
	                  	<h3 class="box-title">Calendar</h3>
	                  	<div class="pull-right box-tools">
		                    <div class="btn-group">
		                      	<button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
		                      		<i class="fa fa-bars"></i>
		                      	</button>
		                      	<ul class="dropdown-menu pull-right" role="menu">
			                        <li><a href="#">Add new event</a></li>
			                        <li><a href="#">Clear events</a></li>
		                      	</ul>
		                    </div>
		                    <button class="btn btn-success btn-sm" data-widget="collapse">
		                    	<i class="fa fa-minus"></i>
		                    </button>
		                    <button class="btn btn-success btn-sm" data-widget="remove">
		                    	<i class="fa fa-times"></i>
		                    </button>
	                  	</div>
	                </div>
	                <div class="box-body">
	                    <div class="chart" style="height: 307px;">
	                      	<div id="calendar"></div>
	                    </div>
                        <div class="chart" style="height: 307px;">
                            <div id="revenue-chart"></div>
                        </div>
                        <div class="chart" style="height: 307px;">
                            <div id="line-chart"></div>
                        </div>
	                </div>
              	</div>
            </section>
        </div>
    </section>
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
                            <option value="0"> Normal</option>
                            <option value="1"> Importante</option>
                            <option value="2"> Urgente</option>
                            <option value="3"> Informativo</option>
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


{{-- SCRIPTS FOR THIS SECTION --}}
@section('scripts')
	<script type="text/javascript" src="js/task.js"></script>
	<script type="text/javascript">
		$('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            startDate: 'today',
            todayHighlight: true,
            todayBtn: true,
            language: 'es'
        });
        
	</script>
@stop