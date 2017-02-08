@extends('layouts.app')
@section('title', 'Cursos')
@section('content')
	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Niveles
        <small>Lista de niveles</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Niveles</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
            <a href="#" class="btn btn-social-icon btn-dropbox" data-toggle="modal" data-target=".example-modal-new" title="nuevo curso">
                <i class="fa fa-plus"></i>
            </a>

            @if (count($levels) > 0)
                <div class="box">
                    <div class="box-header text-center">
                      <h3 class="box-title">Niveles</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nivel</th>
                                    <th class="text-center">Descripción</th>
                                    <td class="text-center">Opciones</td>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td class="text-center" title="Id">{{ $level->id }}</td>
                                        <td class="text-center" title="Curso">{{ $level->level }}</td>
                                        <td class="text-center" title="Descripción">{{ $level->description }}</td>
                                        <td class="text-center">
                                            <a title="Editar" 
                                               class="btn btn-info btn-sm btn-raised btnEditLevel" 
                                               type="button" 
                                               id="{{ $level->id }}">
                                                    <i class="fa fa-btn fa-pencil"></i>
                                            </a>&nbsp;&nbsp;
                                            <a title="Eliminar" 
                                               data-level="{{ $level->level }}" 
                                               class="btn btn-danger btn-sm btn-raised btnDeleteLevel" 
                                               type="button" 
                                               id="{{ $level->id}}">
                                                    <i class="fa fa-btn fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            @else
            <h4 class="text-center">
                No existe ningún nivel registrado en la base de datos.
            </h4>
            @endif
        </div>
    </div>
</section><!-- /.content -->


<div class="modal fade example-modal-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('newLevel') }}" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Agregar Nuevo Nivel</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="level">Nivel:</label>
                      <input type="text" class="form-control" id="level" name="level" placeholder="Nombre del nivel">
                    </div>
                    <div class="form-group">
                      <label for="description">Descripción:</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Descripción del nivel">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="editLevel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('level') }}" id="frmUpdateCourse" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center primary-text">Editar Datos de Nivel</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="editlevel">Nivel:</label>
                      <input type="text" class="form-control" id="editlevel" name="editlevel">
                      <input type="hidden" class="form-control" id="numlevel" name="numlevel">
                    </div>
                    <div class="form-group">
                      <label for="editdescription">Descripción:</label>
                      <input type="text" class="form-control" id="editdescription" name="editdescription">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteLevel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ url('deletelevel')}}" method="POST">
                <div class="modal-header modal-delete">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Eliminar Nivel</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <br>
                    <p class="text-center">¿Esta seguro de querer eliminar <strong id="nivel"></strong> ?</p>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="idLevel" name="idLevel">
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
    <script src="js/clases.js"></script>
@stop


@endsection
