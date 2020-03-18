
@extends('layouts.app')

@section('content')

 <div class="container">


@if(Session::has('Mensaje'))

<div class="alert-success" role="alert">
{{Session::get('Mensaje')}}
	
</div>
@endif

<a href="{{ url('citas/create') }} " class="btn btn-success" > Agregar cita</a>
<br>
<br>

<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Nombre</th>
            <th>Telefono</th>
            <th>Especie</th>
            <th>Edad</th>
            <th>Departamento</th>
            <th>Fecha</th>
            <th>Hora</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($citas as $citas)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$citas->nombre}} </td>
			<td>{{$citas->telefono}}</td>
			<td>{{$citas->especie}}</td>
			<td>{{$citas->edad}}</td>
			<td>{{$citas->departamento}} </td>
			<td>{{$citas->fecha}}</td>
			<td>{{$citas->hora}}</td>

			<td>
				<a class="btn btn-warning" href="{{ url('/citas/'.$citas->id.'/edit') }}">Editar</a>

			<form method="POST" action="{{url('/citas/'.$citas->id) }}" style="display:inline">
				{{csrf_field() }}
				{{ method_field('DELETE') }}
			<button class="btn btn-danger" type="submit" onclick="return confirm('Borrar');">Eliminar</button>
			</form>

			 </td>


		</tr>
		@endforeach
	</tbody>
</table>


</div>

@endsection