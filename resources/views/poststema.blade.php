@extends('layouts.front')
@section('titulo')
publicaciones por tema
@endsection
@section('content')
<!-- CONTENIDO -->

<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-9 rightline">

			<section class="sectiontitulo">Publicaciones por tema</section>
			@foreach($posts as $post)
			<div class="extrapost">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<a href="#"><img src="{{asset('imgPosts/'.$post->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$post->tema->tema}}</h3>
							<p>{{$post->titulo}}</p>
							<span>{{$post->typePost()}}</span><br>
							<a href="{{route('getPost',$post->slug)}}">{!! substr($post->descripcion, 0,150) !!} ...</a><br>
							<span>Publicado {{ \Carbon\Carbon::parse($post->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
				</div>
			</div>
			@endforeach

{{-- 
			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust text-center">
				<div class="bonus">
					<a href="#" target="_blank"><img src="banner/suscription728x90.gif" alt=""></a>
				</div>
				<div class="bonusmobile">
					<a href="#" target="_blank"><img src="banner/suscription363x90.gif" alt=""></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<section class="sectiontitulo">TIPOLOGÍAS DESTACADAS</section>
			@foreach($bloque2 as $bloq2)
			<div class="fila topadjust bottomline">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<a href="#"><img src="{{asset('imgPosts/'.$bloq2->post->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$bloq2->post->tema->tema}}</h3>
							<p>{{$bloq2->post->titulo}}</p>
							<a href="#">{!! substr($bloq2->post->descripcion, 0,150) !!} ...</a><br>
							<span>Publicado {{ \Carbon\Carbon::parse($bloq2->post->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
				</div>
			</div>
			@endforeach --}}
			{!! $posts->render() !!}

		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">

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
</div>
<!-- CONTENIDO -->
@endsection