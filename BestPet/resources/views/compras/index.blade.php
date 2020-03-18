
@extends('layouts.app')

@section('content')

 <div class="container">


@if(Session::has('Mensaje'))

<div class="alert-success" role="alert">
{{Session::get('Mensaje')}}
	
</div>
@endif

<a href="{{ url('compras/create') }} " class="btn btn-success" > Agregar compra</a>
<br>
<br>

<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Nombre</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Tipo de producto</th>
            <th>Forma de pago</th>
            <th>Total</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($compras as $compras)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$compras->nombre_com}}</td>
            <td>{{$compras->apellidos_com}}</td>
            <td>{{$compras->direccion}}</td>
            <td>{{$compras->tipo}}</td>
            <td>{{$compras->forma_pago}}</td>
            <td>{{$compras->total}}</td>
			<td>
				<a class="btn btn-warning" href="{{ url('/compras/'.$compras->id.'/edit') }}">Editar</a>

			<form method="POST" action="{{url('/compras/'.$compras->id) }}" style="display:inline">
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