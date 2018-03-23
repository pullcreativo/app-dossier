@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">Lista de ediciones</div>
		</div>
		<div class="panel-body">
			<div class="col-md-2 col-md-offset-10">
				<a href="{{route('editions.create')}}" class="btn btn-primary">Nuevo</a>
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<th>N° Edición</th>
						<th>Meses</th>
						<th>Editorial</th>
						<th>Autor</th>
						<th>Portada</th>
						<th>Control</th>
					</thead>
					@foreach($editions as $edit)
					<tbody>
							<td width="40">{{$edit->nro_edition}}</td>
							<td>{{$edit->name_pub}}</td>
							<td>{{$edit->editorial}}</td>
							<td>{{$edit->autor}}</td>
							<td>
								<img src="{{asset('imgPosts/'.$edit->portada)}}" class="img-responsive" width="150" alt="">
							</td>
							<td>
								<a href="{{route('editions.edit',$edit->idedicion)}}" class="btn btn-primary btn-sm">Editar</a>
								<a href="{{route('editions.articles',$edit->idedicion)}}" class="btn btn-success btn-sm">Artículos</a>
								<a href="#" class="btn btn-danger btn-sm">Eliminar</a>
							</td>
						
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection