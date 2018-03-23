@extends('layouts.app')
@section('content')
<script>
	function saveTema() {
		var data = $('#formodal').serialize();
		var ruta = "{{route('temas.store')}}";
		var token = $('#token').val();

		$.ajax({
			url: ruta,
			type: 'POST',
			dataType: 'json',
			headers:{'X-CSRF-TOKEN':token},
			data: data,
			success: function(data){
				console.log(data.message);
				location.reload();
			},
			error: function(data){
				console.log(data);
			}	

		});
	}
</script>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-titile">Nuevo video</div>
		</div>
		<div class="panel-body">
				{{-- Inicio de modal --}}
					<div class="modal fade bs-example-modal-lg" id="modal_tema" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
					  <div class="modal-dialog modal-lg" role="document">
					  <form action="#" id="formodal" method="POST" enctype="multipart/form-data">
					    <div class="modal-content">
					      <div class="modal-header">
					      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					      	       <h4 class="modal-title" id="gridSystemModalLabel">Nuevo tema</h4>
					      </div>
					      <div class="modal-body">
					      <div id="message-error" class="alert alert-danger danger" role="alert" style="display: none;">
					      	<strong id="error1"></strong>
					      </div>
					      <input type="hidden" id="token" value="{{ csrf_token()}}">
					      	<div class="form-group">
					      		<label for="tema">Tema</label>
					      		<input type="text" name="tema" class="form-control" placeholder="Ingrese tema">
					      	</div>
					      </div>
					      <div class="modal-footer">
					      	
			      	        <button type="button" onclick="saveTema();" class="btn btn-primary">Guardar</button>
			      	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					    </form>
					  </div>
					</div>
				{{-- Fin de modal --}}
			<div class="row">
				<form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="tema" class="control-label">Seleccione tema</label>
							<div class="input-group">
								<select name="tema" class="form-control">
									@foreach($temas as $tema)
										<option value="{{$tema->idtema}}">{{$tema->tema}}</option>
									@endforeach
								</select>
								<span class="input-group-btn">
								        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_tema" type="button">Nuevo</button>
								 </span>
							</div>
							
						</div>
						<div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
							<label for="titulo" class="control-label">Título</label>
							<input type="text" name="titulo" class="form-control" placeholder="Ingrese título" value="{{old('titulo')}}">
							@if ($errors->has('titulo'))
							    <span class="help-block">
							        <strong>{{ $errors->first('titulo') }}</strong>
							    </span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
							<label for="descripcion" class="control-label">Breve descripción</label>
							<textarea name="descripcion" class="form-control" placeholder="Ingrese descripción" rows="4">{{old('descripcion')}}</textarea>
							@if ($errors->has('descripcion'))
							    <span class="help-block">
							        <strong>{{ $errors->first('descripcion') }}</strong>
							    </span>
							@endif
						</div>
						
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<div class="form-group {{ $errors->has('urlvideo') ? ' has-error' : '' }}">
								<label for="urlvideo" class="control-label">URL Video</label>
								 <div class="input-group">
								  <span class="input-group-addon" id="basic-addon3">Codigo embebido</span>
								  <input type="text" class="form-control" name="urlvideo" placeholder="Ejemplo: FVVj9bYH8SM" id="basic-url" aria-describedby="basic-addon3">
								</div>
								@if ($errors->has('urlvideo'))
								    <span class="help-block">
								        <strong>{{ $errors->first('urlvideo') }}</strong>
								    </span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="priority" class="control-label">Prioridad</label>
							<div class="radio">
								<label style="margin-right: 20px;"><input type="radio" value="1" name="priority">Principal</label>
								<label><input type="radio" checked value="0" name="priority">General</label>
							</div>
							  
						</div>
						<div class="form-group {{ $errors->has('portada') ? ' has-error' : '' }}">
							<label for="portada" id="img-name" class="btn btn-success">Subir Portada (Dimensiones: 1024 x 600px)  <i class="fa fa-upload" aria-hidden="true"></i></label>

								<input type="file" onchange="getNameImage(this);" class="oculto"  accept="image/*" name="portada" id="portada">
								<img id="blah" src="#" class="img-rounded" width="200" style="display: none;" alt="" />
							@if ($errors->has('portada'))
							    <span class="help-block">
							        <strong>{{ $errors->first('portada') }}</strong>
							    </span>
							@endif
						</div>
						<div class="form-group">
							<input type="submit" value="Guardar" class="btn btn-primary">
							<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="panel-footer">
			@include('layouts.footer')
		</div>
	</div>
</div>
@endsection