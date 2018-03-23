@extends('layouts.front')
@section('titulo')
Arquitectura y Diseño Interior
@endsection
@section('content')
<!-- Foto Principal -->
<div class="fila topadjust flexaligner">
	<div class="contenedor">
		<div class="mainfoto">
			<img src="{{asset('imgPosts/'.$mainnot->post->urlfoto)}}" alt="">
		</div>
	</div>
</div>

<!-- Foto Principal -->
<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-9 rightline">
			<div class="postdata">
				<h3>{{$mainnot->post->tema->tema}}</h3>
				<p>{{$mainnot->post->titulo}}</p>
				<a href="{{route('getPost',$mainnot->post->slug)}}">{{$mainnot->post->descripcion}}</a><br>
				<span>Publicado {{ \Carbon\Carbon::parse($mainnot->post->fechapub)->diffForHumans()}}</span>
			</div>

			<!-- BANNER OCULTO --> <div class="hiddenbanner visible-xs"><div class="sponsored">Publicidad</div><img src="banner/suscription728x90.gif" alt=""></div>	<!-- BANNER OCULTO -->

			<div class="fila sectoradjust">
				<section class="sectiontitulo">LO MÁS RECIENTE</section>
				@foreach($bloque1 as $bloq1)
				<div class="extrapost">
					<div class="row">
					<section class="col-xs-12 col-sm-12 col-md-4"><img src="{{asset('imgPosts/'.$bloq1->urlfoto)}}" class="img-responsive" alt=""></section>
					<section class="col-xs-12 col-sm-12 col-md-8">
						<div class="postdata">
							<h3>{{$bloq1->tema->tema}}</h3>
							<p>{{$bloq1->titulo}}</p>
							<span>{{$bloq1->typePost()}}</span><br>
							<a href="{{route('getPost',$bloq1->slug)}}">{!! substr($bloq1->descripcion, 0,100) !!} ...</a><br>
							<span>Publicado {{ \Carbon\Carbon::parse($bloq1->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
					</div>
				</div>
				@endforeach

			<!-- PRODUCTOS -->

			<div class="fila sectoradjust">
				<section class="sectiontitulo bottomline">Productos Destacados</section>
				<div class="productos">
					<span>Los productos que se muestran aqui son promocionados por <a target="_blank" href="http://arquiproductos.com/" target="_blank">arquiproductos.com</a></span>						
				</div>
				<div class="productos flexaligner">
					@foreach($productos as $prod)
					<div class="item">
						<img src="https://www.arquiproductos.com/{{$prod->url_foto}}" alt="">
						<h1>{{$prod->nom_marca}}</h1>
						<a target="_blank" href="http://arquiproductos.com/producto.php?idprod={{$prod->idproducto}}">{{$prod->nom_producto}} </a>
						<p>{!! substr($prod->descripcion, 0,50) !!} ...</p>
					</div>
					@endforeach

					<a href="#" class="enlace">Visitar web</a>
				</div>

			</div>

			<!-- PRODUCTOS -->

			<div class="fila sectoradjust">
				<section class="sectiontitulo">MÁS HISTORIAS</section>

				@foreach($bloque2 as $bloq2)
				<div class="gallery">
					<div class="row flexaligner">
						<section class="col-xs-12 col-sm-9 col-md-9">
							<div class="maingaleria"><img src="{{asset('imgPosts/'.$bloq2->urlfoto)}}" alt=""></div>
						</section>
						<section class="col-xs-12 col-sm-3 col-md-3">							
							<div class="flexalignerh">
								@foreach($bloq2->fotos as $index => $foto)
								@if($index < 3)
								<div class="thumb"><img src="{{asset('imgPosts/'.$foto->urlfoto)}}" class="img-responsive" alt=""></div>
								@endif
								
								@endforeach
								
							</div>
						</section>
					</div>
					<div class="postdata">
						<h3>{{$bloq2->tema->tema}}</h3>
						<p>{{$bloq2->titulo}}</p>
						<span>{{$bloq2->typePost()}}</span><br>
						<a href="{{route('getPost',$bloq2->slug)}}">{{$bloq2->descripcion}}</a><br>
						<span>Publicado {{ \Carbon\Carbon::parse($bloq2->fechapub)->diffForHumans()}}</span>
					</div>
				</div>
				@endforeach

			</div>
		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">

			<div class="fila topadjust">
				<section class="sectiontitulo bottomline">VIDEO DESTACADO</section>
				<div class="video">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$videoP->urlvideo}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					<h1>{{$videoP->post->titulo}}</h1>
				</div>
				<a href="#" class="enlace">Ver videos</a>
			</div>

			<div class="fila sectoradjust">
				<section class="sectiontitulo">TENDENCIAS</section>									
				@foreach($trendings as $index => $trend)
				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">{{$index + 1}}</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="{{route('getPost',$trend->post->slug)}}">{{$trend->post->titulo}}</a> </section>
						<section class="imagerank">
							<img src="{{asset('imgPosts/'.$trend->post->urlfoto)}}" alt="">
						</section>
					</section>
				</div>
				@endforeach
			</div>

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
							<div class="fila topadjust text-center">
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
@endsection