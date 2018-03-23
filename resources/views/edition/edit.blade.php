@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Editar edición</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<form action="{{route('editions.update',$edition->idedicion)}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
				<div class="col-sm-12 col-md-6">
					<div class="form-group {{ $errors->has('nro_edition') ? ' has-error' : '' }}">
						<label for="nro_edition" class="control-label">N° de edición</label>
						<input type="text" class="form-control" name="nro_edition" placeholder="Ingrese número de edición" value="{{$edition->nro_edition}}">
						@if ($errors->has('nro_edition'))
						    <span class="help-block">
						        <strong>{{ $errors->first('nro_edition') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('name_pub') ? ' has-error' : '' }}">
						<label for="name_pub" class="control-label">Nombre de publicación</label>
						<input type="text" class="form-control" name="name_pub" placeholder="Casas de Playa" value="{{$edition->name_pub}}">
						@if ($errors->has('name_pub'))
						    <span class="help-block">
						        <strong>{{ $errors->first('name_pub') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
						<label for="fechapub" class="control-label">Fecha de publicación</label>
						<input type="date" class="form-control" name="fechapub" value="{{$edition->fechapub}}">
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="form-group {{ $errors->has('editorial') ? ' has-error' : '' }}">
						<label for="editorial" class="control-label">Editorial</label>
						<textarea name="editorial" rows="4" class="form-control" placeholder="Detalle aquí sobre el editorial">{{$edition->editorial}}</textarea>
						@if ($errors->has('editorial'))
						    <span class="help-block">
						        <strong>{{ $errors->first('editorial') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('autor') ? ' has-error' : '' }}">
						<label for="autor" class="control-label">Autor</label>
						<input type="text" class="form-control" name="autor" placeholder="Ingrese Autor" value="{{$edition->autor}}">
						@if ($errors->has('autor'))
						    <span class="help-block">
						        <strong>{{ $errors->first('autor') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('portada') ? ' has-error' : '' }}">
						<label for="portada" id="img-name" class="btn btn-success">Reemplazar Portada (Opcional)  <i class="fa fa-upload" aria-hidden="true"></i></label>

							<input type="file" onchange="getNameImage(this);" class="oculto"  accept="image/*" name="portada" id="portada">
							<img id="blah" src="#" class="img-rounded" width="200" style="display: none;" alt="" />
						@if ($errors->has('portada'))
						    <span class="help-block">
						        <strong>{{ $errors->first('portada') }}</strong>
						    </span>
						@endif
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" value="Guardar" class="btn btn-primary">
						<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection