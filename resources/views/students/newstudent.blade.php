@extends('layouts.app')
@section('title', 'Inscribir')
@section('content')
	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nuevo Alumno
        <small>Hoja de inscripción</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('home') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('students') }}">
                <i class="fa fa-dashboard"></i> Alumnos
            </a></li>
        <li class="active">Inscripción</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12 col-lg-offset-1">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hoja de Inscripción</h3>
                </div>
                <div id="frmAddStudent" class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active tutortab">
                                <a href="#tutor" data-toggle="tab">Tutor</a>
                            </li>
                            <li id="studenttab">
                                <a href="#student" id='' data-toggle="tab">Alumno</a>
                            </li>
                            <li id="infotab">
                                <a href="#education" data-toggle="tab">Educación</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane tutortab" id="tutor">
                                <form action="#" id="newTutor" action="POST" accept-charset="utf-8"> 
                                    {{ csrf_field() }}
                                    <p><small>Información General:</small></p>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="surname">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Primer Apellido" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="lastname">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Segundo Apellido" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="name">Nombre:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre(s)" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="relationship">Parentesco:</label>
                                        <select class="form-control" id="relationship" name="relationship" required>
                                            <option value="">Seleccione uno...</option>
                                            <option value="Madre">Madre</option>
                                            <option value="Padre">Padre</option>
                                            <option value="Abuelo(a)">Abuelo(a)</option>
                                            <option value="Hermano(a)">Hermano(a)</option>
                                            <option value="Tio(a)">Tio(a)</option>
                                            <option value="Tutor">Tutor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="job">Ocupación:</label>
                                        <input type="text" class="form-control" id="job" name="job" placeholder="Ocupación" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="cellphone">Tel. Celular:</label>
                                        <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Celular">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="phone">Tel. Casa:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="familiar">Otro Familiar:</label>
                                        <select class="form-control" id="familiar" name="familiar">
                                            <option value="">Seleccione uno...</option>
                                            <option value="Madre">Madre</option>
                                            <option value="Padre">Padre</option>
                                            <option value="Abuelo(a)">Abuelo(a)</option>
                                            <option value="Hermano(a)">Hermano(a)</option>
                                            <option value="Tio(a)">Tio(a)</option>
                                            <option value="Tutor">Tutor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="phoneAlt">Teléfono:</label>
                                        <input type="text" class="form-control" id="phoneAlt" name="phoneAlt" placeholder="Teléfono de familiar">
                                    </div>
                                    <div><small>Dierección:</small></div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="street">Calle:</label>
                                        <input type="text" class="form-control" id="street" name="street" placeholder="Calle">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="number">Numero:</label>
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Número">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="between">Entre:</label>
                                        <input type="text" class="form-control" id="between" name="between" placeholder="Crusamiento">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="colony">Colonia:</label>
                                        <input type="text" class="form-control" id="colony" name="colony" placeholder="Colonia">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="button" class="btn btn-primary" id="saveTutor">Guardar</button>
                                    </div> <br><br>
                                </form>
                            </div>
                            <div class="tab-pane tutortab" id="student">
                                <form action="#" id="newStudent" method="POST" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <p><small>Información General:</small></p>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="surname">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Primer Apellido" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="lastname">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Segundo Apellido" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="name">Nombre:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre(s)" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="relationship">Fecha de Nacimiento:</label>
                                         <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Ocupación" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="job">Sexo:</label>
                                        <select class="form-control" name="genre" id="genre">
                                            <option value="">Seleccione..</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="cellphone">Edo. Civil:</label>
                                        <select class="form-control" name="civilstatus" id="civilstatus">
                                            <option value="">Seleccione..</option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="phone">Num. Celular:</label>
                                        <input type="phone" class="form-control" id="cellphone" name="cellphone" placeholder="Teléfono">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="phone">Foto:</label>
                                        <input type="text" class="form-control" id="photo" name="photo" placeholder="Choose a picture">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div><small>Dierección:</small></div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="street">Calle:</label>
                                        <input type="text" class="form-control" id="streetst" name="street" placeholder="Calle">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="number">Numero:</label>
                                        <input type="text" class="form-control" id="numberst" name="number" placeholder="Número">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="between">Entre:</label>
                                        <input type="text" class="form-control" id="betweenst" name="between" placeholder="Crusamiento">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="colony">Colonia:</label>
                                        <input type="text" class="form-control" id="colonyst" name="colony" placeholder="Colonia">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="phoneAlt">Referencia Domiciliar:</label>
                                        <input type="text" class="form-control" id="reference" name="reference" placeholder="Teléfono de familiar">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>¿Padece alguna enfermedad?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>No
                                            <input type="radio" id='yes' name="issickness" class="flat-red" value="No" checked>
                                        </label>&nbsp;&nbsp;&nbsp;
                                        <label>Si
                                            <input type="radio" id='not' name="issickness" class="flat-red" value="Si">
                                        </label>
                                        <div id="sikness">
                                            <div class="col-lg-12">
                                                <label for="phoneAlt">Especifique Cual:</label>
                                                <input type="text" class="form-control" id="seckness" name="seckness" placeholder="Nombre del padecimiento"> 
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="phoneAlt">¿Cuál es el tratamiento?:</label>
                                                <input type="text" class="form-control" id="medication" name="medication" placeholder="Medicamentos y/o procedimientos"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>¿Es de familia Homestay?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>No
                                            <input type="radio" id='homestay' name="homestay" class="flat-red" checked>
                                        </label>&nbsp;&nbsp;&nbsp;
                                        <label>Si
                                            <input type="radio" id='homestay' name="homestay" class="flat-red">
                                        </label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Observaciones:</label>
                                        <textarea name="anotations" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="button" class="btn btn-primary" id="saveStudent">Guardar</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="education">
                                <form action="#" id="newInfo" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <p><small>Información General:</small></p>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="surname">Ocupación:</label>
                                        <select class="form-control" name="ocupation" required>
                                            <option value="">Seleccione...</option>
                                            <option value="Estudio">Estudio</option>
                                            <option value="Trabajo">Trabajo</option>
                                            <option value="Ninguno">Ninguno</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="lastname">Lugar de estudio o trabajo:</label>
                                        <input type="text" class="form-control" id="workplace" name="workplace" placeholder="Donde estudia/trabaja" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="name">Nivel de estudios:</label>
                                        <select class="form-control" name="studies" required>
                                            <option value="">Seleccione...</option>
                                            <option value="Preescolar">Preescolar</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Secundaria">Secundaria</option>
                                            <option value="Preparatoria">Preparatoria</option>
                                            <option value="Licenciatura">Licenciatura</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="relationship">Último Grado:</label>
                                        <select class="form-control" name="studies" required>
                                            <option value="">Seleccione...</option>
                                            <option value="">Primer Año</option>
                                            <option value="">Segundo Año</option>
                                            <option value="">Tercer Año</option>
                                            <option value="">Cuarto Año</option>
                                            <option value="">Quinto Año</option>
                                            <option value="">Sexto Año</option>
                                            <option value="">Concluido</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-8 col-md-6 col-sm-12" style="padding-top: 30px">
                                        <label for="isprevcourse">¿Ha tomado algún curso de ingles anteriormente?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>No
                                            <input type="radio" name="isprevcourse" class="flat-red" checked>
                                        </label>&nbsp;&nbsp;&nbsp;
                                        <label>Si
                                            <input type="radio" name="isprevcourse" class="flat-red">
                                        </label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-lg-12 col-md-6 col-sm-12">
                                        <label for="phoneAlt">Describa:</label>
                                        <input type="text" class="form-control" id="seckness" name="seckness" placeholder="Nombre del padecimiento"> 
                                    </div>
                                    <p><small>Curso a Tomar:</small></p>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="course">Curso:</label>
                                        <select class="form-control" name="course" id="course">
                                            <option value="">Seleccione..</option>
                                            <option value="">Englis Club</option>
                                            <option value="">Primary</option>
                                            <option value="">Adolescent</option>
                                            <option value="">Adults</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="level">Nivel:</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="">Seleccione..</option>
                                            <option value="">Englis Club</option>
                                            <option value="">Primary</option>
                                            <option value="">Adolescent</option>
                                            <option value="">Adults</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="phone">Fecha de inicio (Alumno):</label>
                                        <input type="text" class="form-control" id="dateinitstudent" name="dateinitstudent" placeholder="Cunado inicia el alumno">
                                    </div>
                                    <div class="clearfix"></div>
                                    <p><small>Otros Datos:</small></p>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12"><br>
                                        <label>¿Entrego Acta de nacimiento?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>No
                                            <input type="radio" name="giveid" class="flat-red" checked>
                                        </label>&nbsp;&nbsp;&nbsp;
                                        <label>Si
                                            <input type="radio" name="giveid" class="flat-red">
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12"><br>
                                        <label>¿Requiere facturación?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>No
                                            <input type="radio" name="requirefact" class="flat-red" checked>
                                        </label>&nbsp;&nbsp;&nbsp;
                                        <label>Si
                                            <input type="radio" name="requirefact" class="flat-red">
                                        </label>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="button" class="btn btn-primary" id="saveStudent">Guardar</button>
                                    </div>
                                    <br>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.nav-tabs-custom -->
                </div>
            </div>
        </div>
    </div>
</section>


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
                    <p class="text-center">¿Esta seguro de querer eliminar <br><strong id="nivel"></strong> ?</p>
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

@endsection

@section('scripts')
    <script src="js/students.js"></script>
@stop