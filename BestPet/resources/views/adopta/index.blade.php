
@extends('layouts.app')

@section('content')

 <div class="container">


@if(Session::has('Mensaje'))

<div class="alert-success" role="alert">
{{Session::get('Mensaje')}}
	
</div>
@endif

<a href="{{ url('adopta/create') }} " class="btn btn-success" > Agregar adopcion</a>
<br>
<br>

<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Status</th>
			<th>Telefono</th>
			<th>Email</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($adopta as $adoptas)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$adoptas->nombre}} {{$adoptas->apellidos}}</td>
			
			<td>{{$adoptas->status}}</td>
			<td>{{$adoptas->telefono}}</td>
			<td>{{$adoptas->email}}</td>
			<td>
				<a class="btn btn-warning" href="{{ url('/adopta/'.$adoptas->id.'/edit') }}">Editar</a>

			<form method="POST" action="{{url('/adopta/'.$adoptas->id) }}" style="display:inline">
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