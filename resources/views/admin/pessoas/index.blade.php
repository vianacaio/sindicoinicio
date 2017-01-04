@extends('layouts.admin')

@section('content')



<div class="container">
	
	<div class="row list-query">
	
		<h2>Listagem de Pessoas</h2>
		<a href="{{route('pessoas.create')}}" class="button">Nova Pessoa</a>
		<table class="hover">
			<thead>
				<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Ação</th>
				</tr>
			</thead>

			<tbody>
				@foreach($pessoas as $pessoa)
				<tr>
					<td>{{ $pessoa->id }}</td>
					<td>{{ $pessoa->no_pessoa}}</td>
					<td>
						Descrição
					</td>
					<td>
						<a href="#"><i class="fa fa-trash" aria-hidden="true"></i>Excluir</a> | 
						<a href="#"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>		


</div>

@endsection