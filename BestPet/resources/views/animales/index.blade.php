
@extends('layouts.app')

@section('content')

 <div class="container">


@if(Session::has('Mensaje'))

<div class="alert-success" role="alert">
{{Session::get('Mensaje')}}
	
</div>
@endif

<a href="{{ url('animales/create') }} " class="btn btn-success" > Agregar animal</a>
<br>
<br>

<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>##</th>
			 <th>Nombre</th>
               <th>Especie animal</th>
               <th>Edad del animal</th>
               <th>Status del animal </th>
               <th>Acciones</th>
               
		</tr>
	</thead>
	<tbody>
		@foreach($animales as $animales)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$animales->nombre}}</td>
			<td>{{$animales->especie_a}}</td>
			<td>{{$animales->edad_a}}</td>
			<td>{{$animales->status_a}}</td>
			<td>
				<a class="btn btn-warning" href="{{ url('/animales/'.$animales->id.'/edit') }}">Editar</a>

			<form method="POST" action="{{url('/animales/'.$animales->id) }}" style="display:inline">
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