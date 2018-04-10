@extends('layouts.front')
@section('titulo')
Arquitectura y Diseño Interior
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('css/estilo.css')}}">
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
				<a href="{{route('getPost',$mainnot->post->slug)}}"><h2>{{$mainnot->post->titulo}}</h2></a>
				<p>{{$mainnot->post->descripcion}}</p>
				<span>Publicado {{ \Carbon\Carbon::parse($mainnot->post->fechapub)->diffForHumans()}}</span>
			</div>

			<!-- BANNER OCULTO --> <div class="hiddenbanner visible-xs"><div class="sponsored">Publicidad</div><a href="#"><img src="{{asset('banner/suscription728x90.gif')}}" alt=""></a></div>	<!-- BANNER OCULTO -->

			<div class="fila sectoradjust">
				{{-- <div class="cuerpo">
					<div class="sector">
					    <section class="cajatexto">
					        <img src="http://www.constructivo.com/images/logoP.png" alt="Constructivo plataforma de Ingeniería">
					        <div class="suscriptor"><span>Nueva Zona de Suscriptores</span></div>
					        <p>Aprenda y capacítese con nuestra nueva plataforma de ingeniería, donde podrá ver nuestras publicaciones y leer cientos de artículos técnicos.</p>
					        <section class="linelinker">
					            <div class="sector"> <a target="_blank" rel="noopener noreferrer" href="http://virtual.constructivo.com/" class="green">Acceder</a> </div>
					            <div class="sector"> <a target="_blank" rel="noopener noreferrer" href="http://www.virtual.constructivo.com/intro.php" class="blue">Leer Más</a> </div>
					        </section>
					    </section>
					</div>
					<div class="sectorpic">
					    <img src="http://www.constructivo.com/images/img.png" alt="Constructivo plataforma de Ingeniería">
					    
					</div>
				</div> --}}
				<section class="sectiontitulo">LO MÁS RECIENTE</section>
				@foreach($bloque1 as $bloq1)
				<div class="extrapost">
					<div class="row">
					<section class="col-xs-12 col-sm-12 col-md-4">
						<a href="{{route('getPost',$bloq1->slug)}}"><img src="{{asset('imgPosts/'.$bloq1->urlfoto)}}" class="img-responsive" alt=""></a></section>
					<section class="col-xs-12 col-sm-12 col-md-8">
						<div class="postdata">
							<h3>{{$bloq1->tema->tema}}</h3>
							<a href="{{route('getPost',$bloq1->slug)}}"><h2>{{$bloq1->titulo}}</h2></a>
							<span>{{$bloq1->typePost()}}</span><br>
							<p>{!! substr($bloq1->descripcion, 0,100) !!} ...</p>
							<span>Publicado {{ \Carbon\Carbon::parse($bloq1->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
					</div>
				</div>
				@endforeach
			</div>
			<!-- PRODUCTOS -->
			<!-- BANNER-->
			<div class="fila sectoradjust flexcenter">
				<div class="bannerinto">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/casasdeplaya728x90.gif')}}" alt=""></a>
				</div>
			</div>
			<!-- BANNER-->

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

					<a target="_blank" href="http://arquiproductos.com/" class="enlace">Visitar web</a>
				</div>

			</div>

			<!-- PRODUCTOS -->
			<!-- BANNER-->
			<div class="fila sectoradjust flexcenter">
				<div class="bannerinto">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/anuncie728x90.gif')}}" alt=""></a>
				</div>
			</div>
			<!-- BANNER-->

			<div class="fila sectoradjust">
				<section class="sectiontitulo">MÁS NOVEDADES</section>

				@foreach($bloque2 as $bloq2)
				<div class="gallery">
					<div class="row flexaligner">
						<section class="col-xs-12 col-sm-9 col-md-9">
							<div class="maingaleria"><a href="{{route('getPost',$bloq2->slug)}}"><img src="{{asset('imgPosts/'.$bloq2->urlfoto)}}" alt=""></a></div>
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
						<a href="{{route('getPost',$bloq2->slug)}}"><h2>{{$bloq2->titulo}}</h2></a>
						<span>{{$bloq2->typePost()}}</span><br>
						<p>{{$bloq2->descripcion}}</p>
						<span>Publicado {{ \Carbon\Carbon::parse($bloq2->fechapub)->diffForHumans()}}</span>
					</div>
				</div>
				@endforeach

				<div class="fila topadjust text-center">
					<a target="_blank" href="{{route('getNoticias')}}" class="btn btn-success btn-sm">Ver más</a>
				</div>

			</div>
			<!-- BANNER-->
			<div class="fila sectoradjust flexcenter">
				<div class="bannerinto">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/anuncie728x90.gif')}}" alt=""></a>
				</div>
			</div>
			<!-- BANNER-->
		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">

			<div class="fila topadjust">
				@include('layouts.newslatter')
			</div>
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<a target="_blank" href="http://virtual.constructivo.com/"><img src="{{asset('banner/plataforma340x340.jpg')}}" alt="Banner Plataforma"></a>
				</div>
			</div>
			<div class="fila sectoradjust">
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
					<a href="#"><img src="{{asset('banner/anuncie340x340.gif')}}" alt="Banner expodeco"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<!-- EVENTOS RECOMENDADOS -  DERECHA INDEX -->
			<div class="fila sectoradjust">
				<section class="sectiontitulo">EVENTOS Y CONCURSOS</section>							
				@foreach($events as $event)
				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank"> <i class="fas fa-angle-right"></i> </section>
					<section class="col-xs-9 col-sm-9 col-md-11">
						<div class="eventodata">
							<a href="{{route('getPost',$event->post->slug)}}"><h2>{{$event->post->titulo}}</h2></a>
							Inicia el:  {{date("d/m/Y",strtotime($event->fechaini))}}<br>
						</div>
					</section>
				</div>
				@endforeach

				<div class="fila topadjust text-center"><a href="{{route('getEventos')}}" class="btn btn-success btn-xs">Ver todos</a></div>
			</div>
			<!-- EVENTOS RECOMENDADOS -  DERECHA INDEX -->


			<div class="fila sectoradjust">
				<div class="suscription">
					<section class="sectiontitulo">Suscríbete al Dossier de Arquitectura</section>
					<div class="row">

						<section class="col-xs-12 col-sm-8 col-md-8">								
							<h4>{{$last_edition->name_pub}}</h4>
							Presentamos las últimas novedades en {{$last_edition->name_pub}} Ed. {{$last_edition->nro_edition}}
							<div class="fila topadjust text-center">
								<a href="http://sga.constructivo.com/visitante/create/DA" class="btn btn-success">Suscríbete</a>
							</div>
						</section>
						<section class="col-xs-12 col-sm-4 col-md-4">								
							<img src="{{asset('imgPosts/'.$last_edition->portada)}}" class="img-responsive" alt="">
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
					<a href="#"><img src="{{asset('banner/suscrip340x340.jpg')}}" alt="Banner expodeco"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<a href="#"><img src="{{asset('banner/anuncie340x340.gif')}}" alt="Banner expodeco"></a>
				</div>
			</div>
			<!-- BANNER LATERAL -->
		</section>
		<!-- COLUMNA ASIDE -->
	</div>
	</div>
</div>
@endsection