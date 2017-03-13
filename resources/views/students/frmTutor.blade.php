<h3>Tutor</h3>
<form action="#" id="newTutor" accept-charset="utf-8">
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
        <button type="buton" class="btn btn-primary" id="saveTutor">Guardar</button>
    </div>
</form>