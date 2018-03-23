@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Fotos extras de noticia</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<form action="{{route('posts.savefoto')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="idpost" value="{{$post->idpost}}">
					<div class="col-sm-12 col-md-6">
						<div class="form-group {{ $errors->has('portada') ? ' has-error' : '' }}">
							<label for="portada" id="img-name" class="btn btn-success">Elige una foto (Dimensiones: 1024 x 600px)  <i class="fa fa-upload" aria-hidden="true"></i></label>

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
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Agregar">
						</div>
					</div>
				</form>
			</div>
			<hr>
			<div class="row">
			@if(count($post->fotos) > 0)
			@foreach($post->fotos as $foto)
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="{{asset('imgPosts/'.$foto->urlfoto)}}" alt="...">
			      <div class="caption">
			        
			        <p><a onclick="return confirm('ADVERTENCIA\n¿Seguro de eliminar la imagen?')" href="{{route('posts.removefoto',$foto->idfoto)}}" class="btn btn-danger" role="button">Eliminar</a></p>
			      </div>
			    </div>
			  </div>
			  @endforeach
			@else
			<div class="col-sm-6 col-md-4">
			  <div class="thumbnail">
			    <div class="caption">
			    	<p>No hay fotos ;)</p>
			    </div>
			  </div>
			</div>
			
			@endif
			
			</div>
		</div>
	</div>
</div>
@endsection
