
{{ $Modo=='crear' ? 'Agregar adopcion':'Modificar adopcion' }}
<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre'}}</label>
	<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre" id="nombre" 
	value="{{ isset($adopta->nombre)?$adopta->nombre:old('nombre') }}">
	{!! $errors->first('nombre','<div class="invalid-feedback">:message </div>') !!}
	</div>

<div class="form-group">
	<label for="apellidos" class="control-label">{{'Apellidos'}}</label>
	<input type="text" class="form-control {{$errors->has('apellidos')?'is-invalid':'' }}" name="apellidos" id="apellidos" 
	value="{{ isset($adopta->apellidos)?$adopta->apellidos:old('apellidos') }}">	
	{!! $errors->first('apellidos','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
	<label for="status" class="control-label">{{'Status'}}</label>
	<input type="text" class="form-control {{$errors->has('status')?'is-invalid':'' }}" name="status" id="status" 
	value="{{ isset($status->status)?$adopta->status:old('status') }}">
	{!! $errors->first('status','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
	<label for="telefono" class="control-label">{{'Telefono'}}</label>
	<input type="text" class="form-control {{$errors->has('status')?'is-invalid':'' }}" name="telefono" id="telefono" value="{{ isset($adopta->telefono)?$adopta->telefono:old('telefono') }}">
	{!! $errors->first('telefono','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
	<label for="email" class="control-label">{{'Email'}}</label>
	<input type="email" class="form-control {{$errors->has('email')?'is-invalid':'' }}" name="email" id="email" value="{{ isset($adopta->email)?$adopta->email:old('email') }}">
	{!! $errors->first('email','<div class="invalid-feedback">:message </div>') !!}


</div>
    
    <a class="btn btn-primary" href="{{ url('adopta') }} "> Regresar </a>
    
    <input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">