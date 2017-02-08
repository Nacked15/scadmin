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
        <button class="btn btn-info" id="newClasse">
            <i class="fa fa-plus"></i> Nueva Clase
        </button>
    </div>
	<div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Clases del Ciclo {{ date('Y') }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Clase</th>
                    <th class="text-center">Fecha de inicio</th>
                    <th class="text-center">Fecha de Clausura</th>
                    <th class="text-center">Dias</th>
                    <th class="text-center">Horario</th>
                    <th class="text-center">Maestro</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($clases as $clase)
                    <tr>
                        <td class="text-center"> {{ $clase->id }}</td>
                        <td class="text-center"> {{ $clase->name }} {{ $clase->level}}</td>
                        <td class="text-center"> {{ $clase->date_init }} </td>
                        <td class="text-center"> {{ $clase->date_end }} </td>
                        <td class="text-center"> 
                            @foreach ($dias as $dia)
                                @if ($clase->id === $dia->id)
                                    {{ $dia->day }} &nbsp;
                                @endif
                             @endforeach
                        </td>
                        <td class="text-center"> {{ $clase->hour_init }} - {{ $clase->hour_end }}</td>
                        <td class="text-center"> 
                            @if ($clase->id_teacher === 0)
                                    <a href="#" class="addTeacher" id="{{ $clase->id }}" title="Maestro">Asignar Maestro</a>
                            @else
                                @foreach ($maestros as $maestro)
                                    @if ($clase->id_teacher === $maestro->id)
                                        {{ $maestro->name }} {{ $maestro->surname }}
                                    @endif
                                @endforeach
                            @endif 
                        </td>
                        <td class="text-center"> 
                            <a title="Editar" 
                               class="btn btn-info btn-sm btn-raised btnEditClass" 
                               type="button" 
                               id="{{ $clase->id }}">
                                    <i class="fa fa-btn fa-pencil"></i>
                            </a>&nbsp;&nbsp;&nbsp;
                            <a title="Eliminar" 
                               class="btn btn-danger btn-sm btn-raised btnDeleteClass" 
                               type="button" 
                               id="{{ $clase->id}}">
                                    <i class="fa fa-btn fa-trash"></i>
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

<div id="newClass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('newClass') }}" method="POST">
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Crear Nueva Clase</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    
                    <div class="row">
                        <div class="form-group  col-lg-6">
                          <label for="course">Clase:</label>
                          <select name="course" class="form-control" data-placeholder="Indique clase" id="course" required>
                                <option></option>
                                @if ($cursos)
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description">Nivel:</label>
                            <select name="level" class="form-control" data-placeholder="Indique nivel" id="level" required>
                                <option></option>
                                @if ($niveles)
                                    @foreach ($niveles as $nivel)
                                        <option value="{{ $nivel->id }}">{{ $nivel->level }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description">Fecha Inicio:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="dateInit" name="dateInit" placeholder="Para cuando">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description">Fecha Fin:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="dateEnd" name="dateEnd" placeholder="Para cuando">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Dias</label>
                            <select class="form-control select2"
                                    id="days"
                                    name="days[]" 
                                    multiple="multiple" 
                                    data-placeholder="Indique dias" 
                                    style="width: 100%;">
                                @foreach ($days as $dia)
                                    <option value="{{ $dia->id }}">{{ $dia->day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description">Ciclo Escolar:</label>
                            <select name="ciclo" class="form-control" id="ciclo" required>
                                <option>Seleccione ciclo</option>
                                <option value="{{ date('Y')+1}} A">{{ date('Y')+1}} A</option>
                                <option value="{{ date('Y')+1}} B">{{ date('Y')+1}} B</option>
                                <option value="{{ date('Y')}} A">{{ date('Y')}} A</option>
                                <option value="{{ date('Y')}} B">{{ date('Y')}} B</option>
                            </select>
                        </div>
                        <div class="bootstrap-timepicker col-lg-6">
                            <div class="form-group">
                                <label>Hora Entrada:</label>
                                <div class="input-group">
                                    <input type="text" id="hourInit" name="hourInit" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bootstrap-timepicker col-lg-6">
                            <div class="form-group">
                                <label>Hora Salida:</label>
                                <div class="input-group">
                                    <input type="text" id="HourEnd" name="hourEnd" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<div id="deleteClass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

<div id="setTeacher" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ url('addTeacher') }}" method="POST">
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Agregar Maestro</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="clase_id" name="clase_id">
                        <label for="course">Maestro:</label>
                        <select name="setMaestro" class="form-control" id="setMaestro" required>
                            <option value="">Seleccione uno...</option>
                            @if ($maestros)
                                @foreach ($maestros as $maestro)
                                    <option value="{{ $maestro->id }}">
                                        {{ strtoupper($maestro->name) }}
                                        {{ strtoupper($maestro->surname) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnDeleteTask">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="js/clases.js"></script>
@stop


