@extends('layouts.admin')

@section('content')


<div class="container">
	
	<div class="row list-query">
	
		<h2>Listagem de Condomínios</h2>
		<a href="{{route('condominios.create')}}" class="button">Novo Condomínio</a>

		<table>
			<thead>
				<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Ação</th>
				</tr>
			</thead>

			<tbody>
				@foreach($condominios as $condominio)
				<tr>
					<td>{{ $condominio->id }}</td>
					<td>{{ $condominio->no_condominio}}</td>
					<td>
						Descrição
					</td>
					<td>
						<a href="#"><i class="fa fa-trash" aria-hidden="true"></i>Excluir</a> | 
						<a href="{{route('condominios.edit', ['condominio' => $condominio->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>		


</div>

@endsection

