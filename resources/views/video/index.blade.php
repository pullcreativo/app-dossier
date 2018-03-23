@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">Videos recientes</div>
		</div>
		<div class="panel-body">
			<div class="col-md-2 col-md-offset-10">
				<a href="{{route('videos.create')}}" class="btn btn-primary">Nuevo</a>
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<th>Tema</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Imagen</th>
						<th>Prioridad</th>
						<th>Control</th>
					</thead>
					@foreach($videos as $video)
					<tbody>
						<td>{{$video->post->tema->tema}}</td>
						<td>{{$video->post->titulo}}</td>
						<td>{{$video->post->descripcion}}</td>
						<td>
							<img class="img-responsive" width="400" src="{{asset('imgPosts/'.$video->post->urlfoto)}}" alt="">
						</td>
						@if($video->priority == 1)
						<td class="success">Principal</td>
						@else
						<td class="danger">General</td>
						@endif
						<td width="200">
							<a href="{{route('videos.edit',$video->idvideo)}}" class="btn btn-primary btn-sm">Editar</a>
							<a href="{{route('posts.delete',$video->post->idpost)}}" onclick="return confirm('ADVERTENCIA:\n¿Seguro de eliminar el registro?')" class="btn btn-danger btn-sm">Eliminar</a>
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