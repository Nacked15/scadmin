@extends('layouts.app')
@section('title', 'Cursos')
@section('content')
	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cursos
        <small>Lista de cursos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Cursos</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
            <a href="#" class="btn btn-social-icon btn-dropbox" data-toggle="modal" data-target=".example-modal-new" title="nuevo curso">
                <i class="fa fa-plus"></i>
            </a>

            @if (count($cursos) > 0)
                <div class="box">
                    <div class="box-header text-center">
                      <h3 class="box-title">Cursos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Curso</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($cursos as $curso)
                                    <tr>
                                        <td class="" title="Id">{{ $curso->id }}</td>
                                        <td class="" title="Curso">{{ $curso->name }}</td>
                                        <td class="" title="Descripción">{{ $curso->description }}</td>
                                        <td class="text-center">
                                            <a title="Editar" 
                                               class="btn btn-info btn-sm btn-raised btnUpdateCourse" 
                                               data-toggle="modal" 
                                               data-target=".example-modal-update" 
                                               type="button" 
                                               id="{{ $curso->id}}">
                                                    <i class="fa fa-btn fa-pencil"></i>
                                            </a>&nbsp;&nbsp;&nbsp;
                                            <a title="Eliminar" 
                                               class="btn btn-danger btn-sm btn-raised deleteCourse"
                                               data-curso="{{ $curso->name }}" 
                                               type="button" id="{{ $curso->id }}">
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
                No existe ningún curso en la base de datos.
            </h4>
            @endif
        </div>
    </div>
</section><!-- /.content -->


<div class="modal fade example-modal-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('newCourse') }}" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Agregar Nuevo Curso</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="course">Curso:</label>
                      <input type="text" class="form-control" id="course" name="course" placeholder="Nombre del curso">
                    </div>
                    <div class="form-group">
                      <label for="description">Descripción:</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Descripción del curso">
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

<div class="modal fade example-modal-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ url('course') }}" id="frmUpdateCourse" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="modal-header modal-new">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center primary-text">Editar Curso</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="curso">Curso:</label>
                      <input type="text" class="form-control" id="curso" name="curso">
                      <input type="hidden" class="form-control" id="numcurso" name="numcurso">
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripción:</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteCourse" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ url('deletecourse')}}" method="POST">
                <div class="modal-header modal-delete">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <h4 class="modal-title text-center primary-text">Eliminar Curso</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <br>
                    <p class="text-center">¿Esta seguro de querer eliminar <br>
                        <strong id="curso"></strong> ?
                    </p>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="idcourse" name="idcourse">
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
