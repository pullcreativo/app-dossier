@extends('layouts.front')
@section('titulo')
Acerca de Nosotros
@endsection
@section('content')

<div class="fila sectoradjust">
		<div class="contenedor">
			<div class="row">
			<section class="col-xs-12 col-sm-12 col-md-9 rightline">

				<section class="sectiontitulo">ACERCA DE NOSOTROS</section>

				<div class="extrapost">
					<div class="row">
						<section class="col-xs-12 col-sm-12 col-md-12">
							<div class="postdata">
								Publicación de vanguardia dentro de la arquitectura peruana, que conjuga el carácter técnico informativo con el enfoque arquitectónico y el diseño interior que demanda el profesional de hoy.<br>
								Selecciona en cada número una tipología de edificación: Casas Urbanas, Departamentos, Espacios Corporativos, Flats & Lofts, Tendencias Contemporáneas, Casas de Campo, Condominios, Casas de Playa, Diseño interior y otros.
							</div>
						</section>
					</div>
				</div>

				<div class="extrapost">
					<div class="row">
						<div class="mostrador">
							<div class="revista"><img src="{{asset('img/campo.png')}}" class="img-responsive" alt=""></div>
							<div class="revista"> <img src="{{asset('img/corporativos.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/departamentos.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/edificios.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/flats.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/oficina.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/playa.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/tendencias.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/interior.png')}}" class="img-responsive"  alt=""> </div>
							<div class="revista"> <img src="{{asset('img/urbanas.png')}}" class="img-responsive"  alt=""> </div>
						</div>
					</div>
				</div>

				<div class="extrapost">
					<div class="row">
						<div class="subtitulo"> Nuestra Misión </div>
						<p>Brindar una selección cuidadosamente editada de la mejor arquitectura, diseño y proyectos de interiores con fotografías, planos y sus descripciones, tanto nacionales como internacionales.</p>
					</div>
				</div>

				<div class="extrapost">
					<div class="row">
						<div class="subtitulo"> Grupo Objetivo </div>
						<p>Arquitectos, decoradores y profesionales interesados en el tema a tratar.</p>
					</div>
				</div>


				<!-- BANNER LATERAL -->
				<div class="fila sectoradjust text-center">
					<div class="bonus">
						<a href="#" target="_blank"><img src="{{asset('banner/suscription728x90.gif')}}" alt=""></a>
					</div>
					<div class="bonusmobile">
						<a href="#" target="_blank"><img src="{{asset('banner/suscription363x90.gif')}}" alt=""></a>
					</div>
				</div>
				<!-- BANNER LATERAL -->

			</section>
			<!-- COLUMNA ASIDE -->
			<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">

				<!-- BANNER LATERAL -->
				<div class="fila sectoradjust">
					<div class="lateralbanner">
						<div class="sponsored">Publicidad</div>
						<img src="banner/expodeco2018.gif" alt="">
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
						<img src="{{asset('banner/expodeco2018.gif')}}" alt="">
					</div>
				</div>
				<!-- BANNER LATERAL -->

				<!-- BANNER LATERAL -->
				<div class="fila sectoradjust">
					<div class="lateralbanner">
						<div class="sponsored">Publicidad</div>
						<img src="{{asset('banner/expodeco2018.gif')}}" alt="">
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