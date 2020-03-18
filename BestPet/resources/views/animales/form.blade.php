
{{ $Modo=='crear' ? 'Agregar animales':'Modificar animales' }}
<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
	<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre" id="nombre" 
	value="{{ isset($animales->nombre)?$animales->nombre:old('nombre') }}">
	{!! $errors->first('nombre','<div class="invalid-feedback">:message </div>') !!}
	</div>

<div class="form-group">
	<label for="especie_a" class="control-label">{{'Especie animal'}}</label>
	<input type="text" class="form-control {{$errors->has('especie_a')?'is-invalid':'' }}" name="especie_a" id="especie_a" 
	value="{{ isset($animales->especie_a)?$animales->especie_a:old('especie_a') }}">	
	{!! $errors->first('especie_a','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
	<label for="edad_a" class="control-label">{{'Edad animal'}}</label>
	<input type="text" class="form-control {{$errors->has('edad_a')?'is-invalid':'' }}" name="edad_a" id="edad_a" value="{{ isset($animales->animales)?$animales->edad_a:old('edad_a') }}">
	{!! $errors->first('edad_a','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
	<label for="status_a" class="control-label">{{'Status animal'}}</label>
	<input type="text" class="form-control {{$errors->has('status_a')?'is-invalid':'' }}" name="status_a" id="status_a" 
	value="{{ isset($status_a->status_a)?$animales->status_a:old('status_a') }}">
	{!! $errors->first('status_a','<div class="invalid-feedback">:message </div>') !!}

</div>

    <a class="btn btn-primary" href="{{ url('animales') }} "> Regresar </a>
    
    <input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">