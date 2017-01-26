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
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group has-warning">
      <label class="control-label" for="inputWarning1">Input with warning</label>
      <input type="text" class="form-control" id="inputWarning1">
    </div>

</section><!-- /.content -->

@endsection
