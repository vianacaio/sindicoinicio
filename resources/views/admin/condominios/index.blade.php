@extends('layouts.admin')

@section('content')


<div class="container">
	
	<div class="row">
	
		<h2>Listagem de Condomínios</h2>
		<table class="bordered striped highlight centered responsive-table z-depth-5"></table>
			<thead>
				<tr>
					
				<th>#</th>
				<th>Nome</th>
				<th>Descrição</th>
				</tr></br>

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
					</tr></br>




				</tr>
				@endforeach




			</tbody>
		</table>
	</div>		


</div>


















@endsection