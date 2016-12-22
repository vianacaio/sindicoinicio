@extends('layouts.admin')

@section('content')


<div class="container" class="novo-cond">
	
	<div class="row list-query">

		<!-- ROTA DIFERENTE POIS CONDOMINIOS NAO ESTA DENTRO DE PASTA ADMIN, A ROTA PUXA DO CONTROLLER -->
		{!! Form::open(['route' => 'condominios.store']) !!}
    	<div class="row">
    		<div class="input-field col-s6">
    			{!! Form::label('name', 'Nome') !!}
    			{!! Form::text('no_condominio', null) !!}
    		</div>


	    		<div class="row">
	    			{!! Form::submit('Criar condomínio', ['class' => 'button']) !!}
	    		</div>

    	</div>



		{!! Form::close() !!}
	
	</div>		


</div>

@endsection

