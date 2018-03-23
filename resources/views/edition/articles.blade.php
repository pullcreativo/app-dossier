@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">Articulos de la edición {{$edition->nro_edition}}</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<form action="{{route('articles.save')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="idedicion" value="{{$edition->idedicion}}">
					<div class="col-sm-12 col-md-6">
						<div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
							<label for="titulo" class="control-label">Título</label>
							<input type="text" class="form-control" name="titulo" placeholder="Ingrese título del artículo">
							@if ($errors->has('titulo'))
							    <span class="help-block">
							        <strong>{{ $errors->first('titulo') }}</strong>
							    </span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('portada') ? ' has-error' : '' }}">
							<label for="portada" id="img-name" class="btn btn-success">Subir imagen  <i class="fa fa-upload" aria-hidden="true"></i></label>

								<input type="file" onchange="getNameImage(this);" class="oculto"  accept="image/*" name="portada" id="portada">
								<img id="blah" src="#" class="img-rounded" width="200" style="display: none;" alt="" />
							@if ($errors->has('portada'))
							    <span class="help-block">
							        <strong>{{ $errors->first('portada') }}</strong>
							    </span>
							@endif
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group {{ $errors->has('contenido') ? ' has-error' : '' }}">
							<label for="contenido" class="control-label">Contenido</label>
							<textarea name="contenido" class="form-control" rows="5" placeholder="Ingrese descripción"></textarea>
							@if ($errors->has('contenido'))
							    <span class="help-block">
							        <strong>{{ $errors->first('contenido') }}</strong>
							    </span>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary" value="Guardar">
					</div>
				</form>
				
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<th>Título</th>
						<th>Contenido</th>
						<th>Imagen</th>
						<th>Control</th>
					</thead>
					@foreach($articles as $art)
					<tbody>
						<td>{{$art->titulo}}</td>
						<td>{!! substr($art->contenido, 0,70) !!} ...</td>
						<td>
							<img class="img-responsive" width="150" src="{{asset('imgPosts/'.$art->imagen)}}" alt="">
						</td>
						<td>
							<a href="#" class="btn btn-danger btn-sm">Quitar</a>
						</td>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection