@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">Eventos recientes</div>
		</div>
		<div class="panel-body">
			<div class="col-md-2 col-md-offset-10">
				<a href="{{route('eventos.create')}}" class="btn btn-primary">Nuevo</a>
			</div>
			<hr>
			<div class="tabel-responsive">
				<table class="table table-condensed">
					<thead>
						<th>Tema</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Imagen</th>
						<th>Destacado?</th>
						<th>control</th>
					</thead>
					@foreach($eventos as $eve)
					<tbody>
						<td>{{$eve->post->tema->tema}}</td>
						<td>{{$eve->post->titulo}}</td>
						<td>{!! substr($eve->post->descripcion, 0,150) !!} ...</td>
						<td>
							<img class="img-responsive" width="200" src="{{asset('imgPosts/'.$eve->post->urlfoto)}}" alt="">
						</td>
						@if($eve->destacado ==1)
						<td class="success">Si</td>
						@else
						<td class="danger">No</td>
						@endif
						<td width="200">
							<a href="{{route('eventos.edit',$eve->idevento)}}" class="btn btn-primary btn-sm">Editar</a>
							<a href="{{route('posts.delete',$eve->post->idpost)}}" onclick="return confirm('ADVERTENCIA:\n¿Seguro de eliminar el registro?')" class="btn btn-danger btn-sm">Eliminar</a>
						</td>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<div class="panel-footer">
			@include('layouts.footer')
		</div>
	</div>

</div>
@endsection