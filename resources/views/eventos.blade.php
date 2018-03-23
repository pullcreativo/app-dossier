@extends('layouts.front')
@section('titulo')
Eventos
@endsection
@section('content')
<!-- CONTENIDO -->

<div class="fila sectoradjust">
	<div class="container">
		<section class="col-xs-12 col-sm-12 col-md-8 rightline">

			<section class="sectiontitulo bottomline">EVENTOS</section>
			@foreach($eventos as $event)
			<div class="fila topadjust bottomline">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<a href="#"><img src="{{asset('imgPosts/'.$event->post->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$event->post->tema->tema}}</h3>
							<p>{{$event->post->titulo}}</p>
							<a href="{{route('getPost',$event->post->slug)}}">{!! substr($event->post->descripcion, 0,150) !!} ...</a><br>
							<span>Inicia el: 23 de Mayo de 2018</span>
						</div>
					</section>
				</div>
			</div>
			@endforeach

			{{$eventos->render()}}

		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-4 hidden-xs">

			{{-- <div class="fila sectoradjust">
				<section class="sectiontitulo">TENDENCIAS</section>									
				
				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">1</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">2</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">3</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">4</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">5</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>
			</div> --}}

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="banner/expodeco2018.gif" alt="">
				</div>
			</div>
			<!-- BANNER LATERAL -->


			<div class="fila sectoradjust">
				<div class="suscription">
					<section class="sectiontitulo">Suscríbete al Dossier de Arquitectura</section>
					<div class="row">

						<section class="col-xs-12 col-sm-8 col-md-8">								
							<h4>ESPACIOS CORPORATIVOS</h4>
							Presentamos las últimas novedades en Espacios Corporativos Ed. 35
							<div class="fila topadjust">
								<button type="button" class="btn btn-default">Comprar</button>
								<button type="button" class="btn btn-success">Suscribirse</button>
							</div>
						</section>
						<section class="col-xs-12 col-sm-4 col-md-4">								
							<img src="edicion/portada35.png" class="img-responsive" alt="">
						</section>
						
						
					</div>
				</div>
			</div>

			<div class="fila sectoradjust">
				<section class="sectiontitulo bottomline">EXPLORAR</section>
				@include('layouts.explorar')
			</div>

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="banner/expodeco2018.gif" alt="">
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="banner/expodeco2018.gif" alt="">
				</div>
			</div>
			<!-- BANNER LATERAL -->



		</section>
		<!-- COLUMNA ASIDE -->
	</div>
</div>
<!-- CONTENIDO -->

@endsection