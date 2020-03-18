
@extends('layouts.app')

@section('content')

 <div class="container">


@if(Session::has('Mensaje'))

<div class="alert-success" role="alert">
{{Session::get('Mensaje')}}
	
</div>
@endif

<a href="{{ url('guarderia/create') }} " class="btn btn-success" > Agregar guarderia</a>
<br>
<br>

<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Nombre del propietario</th>
            <th>Telefono del propietario</th>
            <th>Especie del animal</th>
            <th>Nombre de la mascota</th>
            <th>Tiempo de estancia</th>
            <th>Fecha de ingreso</th>
            <th>Fecha de salida</th>
            <th>Total a pagar</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($guarderia as $guarderia)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$guarderia->nombre_p}} </td>
			<td>{{$guarderia->telefono_p}} </td>
			<td>{{$guarderia->especie_a}}</td>
			<td>{{$guarderia->nombre_m}}</td>
			<td>{{$guarderia->tiempo_estancia}}</td>
			<td>{{$guarderia->fecha_ingreso}}</td>
			<td>{{$guarderia->fecha_salida}}</td>
			<td>{{$guarderia->total_paga}}</td>

			<td>
				<a class="btn btn-warning" href="{{ url('/guarderia/'.$guarderia->id.'/edit') }}">Editar</a>

			<form method="POST" action="{{url('/guarderia/'.$guarderia->id) }}" style="display:inline">
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