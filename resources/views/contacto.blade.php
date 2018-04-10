@extends('layouts.front')
@section('titulo')
Contacte con Nosostros
@endsection
@section('content')
<!-- CONTENIDO -->
<div class="fila topadjust flexaligner">
	<div class="contenedor">
		<div class="mainfoto">
			<img src="post/noticia.jpg" alt="">
		</div>
	</div>
</div>

<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-8 rightline">
			<div class="fila sectoradjust">
				<section class="sectiontitulo bottomline">CONTÁCTANOS</section>
				<div class="fila topadjust">
					<div class="row">							
						<section class="col-xs-12 col-sm-3 col-md-4">
							<img src="{{asset('imgPosts/'.$last_edition->portada)}}" class="img-responsive" alt="{{$last_edition->name_pub}}">
						</section>
						<section class="col-xs-12 col-sm-9 col-md-8">
							<h3>Llene el siguiente formulario para indicar su mensaje.</h3>
							<p>Si tiene algún inconveniente con nuestros servicios o alguna sugerencia para mejorar el portal web, déjenos su información.</p>
							<div class="fila topadjust">

								<form action="{{route('savecontact')}}" method="POST">
									{{ csrf_field() }}
								  <div class="form-group">
								    <label for="name">Nombres y Apellidos</label>
								    <input type="text" class="form-control" name="nombres" id="name" required>
								  </div>
								  <div class="form-group">
								    <label for="correo">Correo Electrónico</label>
								    <input type="email" class="form-control" name="email" id="correo" required>
								  </div>
								  <div class="form-group">
								    <label for="telf">Teléfono/Móvil</label>
								    <input type="text" class="form-control" name="telefono" id="telf" required>
								  </div>
								  <div class="form-group">
								    <label for="empresa">Empresa</label>
								    <input type="text" class="form-control" name="empresa" id="empresa">
								  </div>
								  <div class="form-group">
								    <label for="cargo">Cargo</label>
								    <input type="text" class="form-control" name="cargo" id="cargo">
								  </div>
								  <div class="form-group">
								    <label for="comentario">Comentario</label>
								    <textarea class="form-control" rows="3" name="comentario" id="comentario" required></textarea>
								  </div>
								  
								  <div class="checkbox">
								    <label>
								      <input name="terminos" type="checkbox"> Declaro que esta información es real.
								    </label>
								  </div>
								  <button type="submit" class="btn btn-default">Enviar</button>
								</form>

							</div>
						</section>
						
					</div>
				</div>
				
			</div>
		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-4 hidden-xs">
			<div class="fila topadjust">
				@include('layouts.newslatter')
			</div>
			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<a target="_blank" href="http://virtual.constructivo.com/"><img src="{{asset('banner/plataforma340x340.jpg')}}" alt="Banner Plataforma"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->
			
			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/expodeco2018.gif')}}" alt="Banner expodeco"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<div class="fila sectoradjust">
				<section class="sectiontitulo bottomline">EXPLORAR</section>
				@include('layouts.explorar')
			</div>

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/expodeco2018.gif')}}" alt="Banner expodeco"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/expodeco2018.gif')}}" alt="Banner expodeco"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->



		</section>
		<!-- COLUMNA ASIDE -->
	</div>
	</div>
</div>
<!-- CONTENIDO -->
@endsection