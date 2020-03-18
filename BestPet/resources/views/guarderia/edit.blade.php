
@extends('layouts.app')

@section('content')

 <div class="container">

<form action="{{ url('/guarderia/' .$guarderia->id) }}
" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('guarderia.form',['Modo'=>'editar'])
			
</form>
</div>
@endsection