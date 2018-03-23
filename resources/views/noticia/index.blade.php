@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">Notas recientes</div>
		</div>
		<div class="panel-body">
			<div class="col-md-2 col-md-offset-10">
				<a href="{{route('noticias.create')}}" class="btn btn-primary">Nuevo</a>
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<th>Tema</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Imagen</th>
				        <th>Control</th>
					</thead>
					@foreach($noticias as $not)
					<tbody>
						<td>{{$not->post->tema->tema}}</td>
						<td>{{$not->post->titulo}}</td>
						<td  width="300">{!! substr($not->post->descripcion, 0,150)!!} ...</td>
						<td>
							<img class="img-responsive" width="300" src="{{asset('imgPosts/'.$not->post->urlfoto)}}" alt="">
						</td>
						<td width="200">
							<a href="{{route('noticias.edit',$not->idnoticia)}}" class="btn btn-primary btn-sm">Editar</a>
							<a href="{{route('noticias.show',$not->post->idpost)}}" class="btn btn-success btn-sm">Extra</a>
							<a href="{{route('posts.delete',$not->post->idpost)}}" onclick="return confirm('ADVERTENCIA:\n¿Seguro de eliminar el registro?')" class="btn btn-danger btn-sm">Quitar</a>
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