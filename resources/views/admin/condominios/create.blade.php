@extends('layouts.admin')

@section('content')


<div class="container" class="novo-cond">
	
	<div class="row list-query">
		<h4>Novo Condomínio</h4>
		<!-- ROTA DIFERENTE POIS CONDOMINIOS NAO ESTA DENTRO DE PASTA ADMIN, A ROTA PUXA DO CONTROLLER -->
		{!! Form::open(['route' => 'condominios.store']) !!}

				@include('admin.condominios._form')


				<div class="row">
	    			{!! Form::submit('Criar condomínio', ['class' => 'button']) !!}
	    		</div>




		{!! Form::close() !!}
	
	</div>		


</div>

@endsection

