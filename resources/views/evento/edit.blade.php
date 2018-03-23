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
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-titile">Editar evento</div>
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
				<form action="{{route('eventos.update',$evento->post->idpost)}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					{{ method_field('PUT')}}
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="tema" class="control-label">Seleccione tema</label>
							<div class="input-group">
								<select name="tema" class="form-control">
									@foreach($temas as $tema)
										@if($evento->post->idtema == $tema->idtema)
										<option selected value="{{$tema->idtema}}">{{$tema->tema}}</option>
										@else
										<option value="{{$tema->idtema}}">{{$tema->tema}}</option>
										@endif
										
									@endforeach
								</select>
								<span class="input-group-btn">
								        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_tema" type="button">Nuevo</button>
								 </span>
							</div>
							
						</div>
						<div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
							<label for="titulo" class="control-label">Título</label>
							<input type="text" name="titulo" class="form-control" placeholder="Ingrese título" value="{{$evento->post->titulo}}">
							@if ($errors->has('titulo'))
							    <span class="help-block">
							        <strong>{{ $errors->first('titulo') }}</strong>
							    </span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
							<label for="descripcion" class="control-label">Breve descripción</label>
							<textarea name="descripcion" class="form-control" placeholder="Ingrese descripción" rows="4">{{$evento->post->descripcion}}</textarea>
							@if ($errors->has('descripcion'))
							    <span class="help-block">
							        <strong>{{ $errors->first('descripcion') }}</strong>
							    </span>
							@endif
						</div>
						<div class="form-group">
							<label for="fechaini" class="control-label">Fecha de Inicio</label>
							<input type="date" name="fechaini" class="form-control" value="{{$evento->fechaini}}">
						</div>
						<div class="form-group">
							<label for="destacado" class="control-label">Destacar?</label>
							<div class="radio">
								@if($evento->destacado == 1)
								<label style="margin-right: 20px;"><input type="radio" checked value="1" name="destacado">Si</label>
								<label><input type="radio" value="0" name="destacado">No</label>
								@else
								<label style="margin-right: 20px;"><input type="radio" value="1" name="destacado">Si</label>
								<label><input type="radio" checked value="0" name="destacado">No</label>
								@endif
								
							</div>
							  
						</div>
						<div class="form-group {{ $errors->has('portada') ? ' has-error' : '' }}">
							<label for="portada" id="img-name" class="btn btn-success">Remplazar Portada (Opcional: 1024 x 600px)  <i class="fa fa-upload" aria-hidden="true"></i></label>

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
							<label for="contenido" class="control-label">Especificaciones del Evento</label>
							<textarea name="contenido"  rows="3" 
							 class="form-control ckeditor">{{$evento->datos}}</textarea>
							 @if ($errors->has('contenido'))
							    <span class="help-block">
							        <strong>{{ $errors->first('contenido') }}</strong>
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