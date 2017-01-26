@extends('layouts.app')
@section('title', 'Alumnos')
@section('content')
	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Alumnos
        <small>Lista de Alumnos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Student</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Students English Club</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Pic</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Grupo</th>
                <th>Tutor</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Misc</td>
                <td>Links</td>
                <td>1A</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Lynx</td>
                <td>1A</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>IE Mobile</td>
                <td>1A</td>
                <td>Windows Mobile 6</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>PSP browser</td>
                <td>1A</td>
                <td>PSP</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Other browsers</td>
                <td>All others</td>
                <td>1A</td>
                <td>-</td>
                <td>-</td>
                <td>U</td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.content -->

@endsection
