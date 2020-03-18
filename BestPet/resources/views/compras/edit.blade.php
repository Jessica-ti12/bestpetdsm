@extends('layouts.app')

@section('content')

 <div class="container">

<form action="{{ url('/compras/' .$compras->id) }}
" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('compras.form',['Modo'=>'editar'])
			
</form>
</div>
@endsection
