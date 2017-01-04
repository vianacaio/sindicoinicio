@extends('layouts.admin')

@section('content')


<div class="container" class="novo-cond">
	
	<div class="row list-query">
		<h4>Editar Condomínio</h4>

		<!-- ROTA DIFERENTE POIS CONDOMINIOS NAO ESTA DENTRO DE PASTA ADMIN, A ROTA PUXA DO CONTROLLER -->
		{!! Form::model($condominio,[

					'route' => ['condominios.update', 'condominio' => $condominio->id ],
					'method' => 'PUT'
						]) !!}
    	
    			@include('admin.condominios._form')

				<div class="row">
	    			{!! Form::submit('Editar condomínio', ['class' => 'button']) !!}
	    		</div>




		{!! Form::close() !!}
	
	</div>		


</div>

@endsection

