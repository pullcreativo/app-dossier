<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>@yield('titulo') | Dossier de Arquitectura</title>
	<!-- Bloque de Estilos usados -->
	<link rel="stylesheet" href="{{asset('css/fonts.css')}}" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
	<!-- Bloque de Estilos usados -->

	<!-- Script para usar Font Awesome 5 -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<!-- Script para usar Font Awesome 5 -->
	<!-- Imagen - Favicon  -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icono.png')}}" />
</head>
<body>

	<!-- Menú para Moviles -->
	<div class="mobilemenu" id="mobile">
		<div class="fila text-right"> <a onClick="activator()" class="btn btn-default btn-sm"><i class="fas fa-window-close"></i></a> </div>
		<div class="fila topadjust">
			<form action="{{url('search')}}" method="GET">
				<div class="input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3"><i class="fas fa-search"></i></span>
				  <input type="text" name="q" class="form-control" placeholder="Búsqueda" aria-describedby="sizing-addon3">
				  {{ csrf_field() }}
				</div>
			</form>
			
		</div>
		<div class="fila topadjust">
			<ul class="mobnav">
				<li><a href="{{route('about')}}">Nosotros</a></li>
				<li><a href="{{route('getNoticias')}}">Historias</a></li>
				<li><a href="{{route('getEventos')}}">Eventos</a></li>
				<li><a href="{{route('getEditions')}}">Revista</a></li>
				<li><a href="{{route('sponsored')}}">Publicidad</a></li>
				{{-- <li><a href="#">Venta</a></li> --}}
				<li><a href="{{route('formContact')}}">Contacto</a></li>
			</ul>
		</div>
		<div class="fila topadjust flexaligner">
			<ul class="socialnav">
				<li><a target="_blank" href="https://www.facebook.com/dossierdearquitectura"> <i class="fab fa-facebook"></i> </a></li>
				<li><a target="_blank" href="https://twitter.com/darquitectura"> <i class="fab fa-twitter-square"></i> </a></li>
				<li><a target="_blank" href="http://www.youtube.com/user/dossierarquitectura"> <i class="fab fa-youtube-square"></i> </a></li>
				<li><a target="_blank" href="https://www.instagram.com/dossierarq/"> <i class="fab fa-instagram"></i> </a></li>
			</ul>
		</div>
	</div>
	<!-- Menú para Moviles -->

	<!-- Cabecera de Barra de Búsqueda, Logo y Login -->
	<div class="fila topadjust">
		<div class="contenedor flexaligner">
			<section class="col-xs-2 visible-xs"> <a onClick="activator()" class="btn btn-default btn-sm"> <i class="fas fa-bars"></i> </a> </section>

			<section class="hidden-xs col-xs-12 col-sm-4 col-md-3 flexaligner">
				<form action="{{url('search')}}" method="GET">
					<div class="input-group input-group-sm">
					  <span class="input-group-addon" id="sizing-addon3"><i class="fas fa-search"></i></span>
					  <input type="text" name="q" class="form-control" placeholder="Búsqueda" aria-describedby="sizing-addon3">
					  {{ csrf_field() }}
					</div>
				</form>
			</section>

			<section class="col-xs-8 col-sm-4 col-md-5">
				<div align="center">
					<div class="logo"> <img src="img/dossier.png" alt=""> </div>
					<div class="logomobile"> <img src="img/dossierblack.png" alt=""> </div>
				</div>		
			</section>

			<section class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
				<ul class="nav nav-pills pull-right">
				  <li role="presentation">
				  	<a class="btn btn-default" title="Edición Actual" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Dossier de Arquitectura - Casas de Playa">
					  Edición
					</a>
				  </li>
				  <!-- <li role="presentation"><a href="#">Registro</a></li>
				  <li role="presentation"><a href="#">Ingresar</a></li> -->
				</ul>
			</section>

			<section class="col-xs-2 visible-xs">				
				<div class="btn-group" role="group">					
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    	<i class="fas fa-user"></i>	<span class="caret"></span>
				    </button>
				    {{-- <ul class="dropdown-menu pull-right">
				      <li><a href="#">Registro</a></li>
				      <li><a href="#">Ingresar</a></li>
				    </ul> --}}
				 </div>
			</section>
		</div>
	</div>
	<!-- Cabecera de Barra de Búsqueda, Logo y Login -->

	<!-- Fila de barra de navegación -->
	<div class="fila borderlines topadjust hidden-xs">
		<div class="contenedor">
			<div class="desktopmenu">
				<ul class="desktopnav">
					<li><a href="{{url('/')}}">Inicio</a></li>
					<li><a href="{{route('about')}}">Nosotros</a></li>
					<li><a href="{{route('getNoticias')}}">Historias</a></li>
					<li><a href="{{route('getEventos')}}">Eventos</a></li>
					<li><a href="{{route('getEditions')}}">Revista</a></li>
					<li><a href="{{route('sponsored')}}">Publicidad</a></li>
					<li><a href="#">Venta</a></li>
					<li><a href="{{route('formContact')}}">Contacto</a></li>
				</ul>
				<ul class="socialnav">
					<li><a target="_blank" href="https://www.facebook.com/dossierdearquitectura"> <i class="fab fa-facebook"></i> </a></li>
					<li><a target="_blank" href="https://twitter.com/darquitectura"> <i class="fab fa-twitter-square"></i> </a></li>
					<li><a target="_blank" href="http://www.youtube.com/user/dossierarquitectura"> <i class="fab fa-youtube-square"></i> </a></li>
					<li><a target="_blank" href="https://www.instagram.com/dossierarq/"> <i class="fab fa-instagram"></i> </a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Fila de barra de navegación -->

	<!-- Fila de Banners -->
	<div class="fila sectoradjust">
		<div class="contenedor">
			<div class="bannerfila">
				<div class="mainbanner">
					<div class="sponsored">Publicidad</div>
					<img src="{{asset('banner/hidromec728x90.gif')}}" alt="">
				</div>
				<div class="secondbanner hidden-xs">
					<div class="sponsored">Publicidad</div>
					<img src="{{asset('banner/suscription363x90.gif')}}" alt="">
				</div>
			</div>
		</div>
	</div>
	<!-- Fila de Banners -->


	<!-- CONTENIDO -->
	@yield('content')
	<!-- CONTENIDO -->

	<!-- Fila de Suscripción al Boletín -->
	<div class="fila newsletter">
		<div class="contenedor">
			<div class="row">
				<section class="col-xs-12 col-sm-12 col-md-8">
					<span>No dejes de recibir tu dosis diaria de Arquitectura y Diseño</span>
					<p>Suscríbete al Boletín Diario de Dossier de Arquitectura y no te pierdas las noticias, fotos e historias del Diseño y la Decoración.</p>
				</section>
				<section class="col-xs-12 col-sm-12 col-md-4">
					<form action="http://sga.pullcreativo.com/visitante/boletin" method="GET">
						{{ csrf_field() }}
					  <div class="form-group">
					  	<input type="hidden" name="medio" value="DA">
					    <div class="input-group input-group-lg">
						  <span class="input-group-addon" id="sizing-addon1">@</span>
						  <input type="email" name="email" class="form-control" placeholder="su correo electrónico aqui" aria-describedby="sizing-addon1" required>
						</div>
					  </div>
					  <button type="submit" class="btn btn-default">Suscribirse al Boletín</button>
					</form>
				</section>
			</div>
		</div>
	</div>
	<!-- Fila de Suscripción al Boletín -->

	<!-- Fila de Footer -->
	<div class="fila foot">
		<div class="contenedor">
			<div class="row">
				<div class="fila sectoradjust">
					<div class="logofoot"><img src="img/dossierwhite.png" alt=""></div>
				</div>
				<div class="fila topadjust">
					<div class="row">
						<section class="col-xs-6 col-sm-6 col-md-3">
							<h5 class="subbed">ACERCA DE</h5>
							<ul class="footlist">
								<li><a href="#">Nosotros</a></li>
								<li><a href="#">Publicitar con nosotros</a></li>
								<li><a href="{{route('formContact')}}">Contactenos</a></li>
							</ul>
						</section>
						<section class="col-xs-6 col-sm-6 col-md-3">
							<h5 class="subbed">REVISTA</h5>
							<ul class="footlist">
								<li><a href="#">Edición Actual</a></li>
								<li><a href="http://sga.constructivo.com/visitante/create/DA">Suscribirse</a></li>
								<li><a href="#">Comprar</a></li>						
							</ul>
						</section>
						<section class="col-xs-6 col-sm-6 col-md-3">
							<h5 class="subbed">PROFESIONALES</h5>
							<ul class="footlist">
								{{-- <li><a href="#">Registrarse</a></li> --}}
								<li><a href="#">Promocionar proyectos</a></li>						
							</ul>
						</section>
						<section class="col-xs-6 col-sm-6 col-md-3">
							<h5 class="subbed">PRODUCTOS</h5>
							<ul class="footlist">
								<li><a href="#">Visitar</a></li>
								<li><a href="#">Participar</a></li>						
							</ul>
						</section>
					</div>
				</div>

				<div class="fila topadjust flexaligner">
					<a target="_blank" href="https://www.facebook.com/dossierdearquitectura" class="whitext socialfoot"> <i class="fab fa-facebook"></i> </a>
					<a target="_blank" href="https://twitter.com/darquitectura" class="whitext socialfoot"> <i class="fab fa-twitter-square"></i> </a>
					<a target="_blank" href="http://www.youtube.com/user/dossierarquitectura" class="whitext socialfoot"> <i class="fab fa-youtube-square"></i> </a>
					<a target="_blank" href="https://www.instagram.com/dossierarq/" class="whitext socialfoot"> <i class="fab fa-instagram"></i> </a>
				</div>

				<div class="fila topadjust flexaligner">
					<p>&copy; {{date('Y')}} Dossier de Arquitectura, Todos los derechos reservados</p>
				</div>
			</div>

		</div>
	</div>
	<!-- Fila de Footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

	<script>
		$(function () {
		  $('[data-toggle="popover"]').popover()
		})
	</script>

	<!-- Script para el Menú Mobile -->
	<script type="text/javascript" src="{{asset('js/slideactive.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>
	<!-- Script para el Menú Mobile -->

	<!-- Begin Constant Contact Active Forms -->
	<script> var _ctct_m = "962a0aa8b4dbeec08505f1b21134cae4"; </script>
	<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
	<!-- End Constant Contact Active Forms -->
</body>
</html>