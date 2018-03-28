@extends('layouts.front')
@section('titulo')
Publicidad
@endsection
@section('content')

<!-- CONTENIDO -->
	<div class="fila sectoradjust">
		<div class="contenedor">
			<div class="row">
			<section class="col-xs-12 col-sm-12 col-md-9 rightline">

				<section class="sectiontitulo"> PUBLICIDAD </section>

				<section class="publish">
					<h1>Distribución:</h1>
					<p>Gratuita a una selecta base de datos.<br>
					Venta en escaparate: Sodimac, Promart. Wong, Librerías Zeta, BookStore, Arcadia, Tottus y Universidades.<br>
					Promocionada en eventos de arqutitectura y construcción.</p>
					<h1>Tiraje:</h1>
					<p>8,000 ejemplares.</p>

					<h1>Periodicidad:</h1>
					<p>Trimestral</p>

					<h1>Fecha de Publicación:</h1> <p>Junio, Setiembre y Diciembre.</p>

					<h1>Revista Versión Impresa:</h1>
					<div class="row">
						<section class="col-xs-6 col-sm-3 col-md-3 text-center"><img src="{{asset('img/1.png')}}" class="img-responsive" alt=""><p>Tiraje</p></section>
						<section class="col-xs-6 col-sm-3 col-md-3 text-center"><img src="{{asset('img/2.png')}}" class="img-responsive" alt=""><p>Periodicidad</p></section>
						<section class="col-xs-6 col-sm-3 col-md-3 text-center"><img src="{{asset('img/3.png')}}" class="img-responsive" alt=""><p>Distribución</p></section>
						<section class="col-xs-6 col-sm-3 col-md-3 text-center"><img src="{{asset('img/4.png')}}" class="img-responsive" alt=""><p>Lectoría</p></section>
					</div>

					<h1>Revista Versión Digital:</h1>
					<div class="row">
						<section class="col-xs-12 col-sm-6 col-md-6 text-center"><img src="{{asset('img/vistasdiaria.png')}}" class="img-responsive" alt=""></section>
						<section class="col-xs-12 col-sm-6 col-md-6 text-center"><img src="{{asset('img/impresadigital.png')}}" class="img-responsive" alt=""></section>
					</div>

					<h1>Formatos:</h1>
					<div class="row">
						<section class="col-xs-12 col-sm-4 col-md-4 text-center"> <img src="{{asset('img/contra.png')}}" class="img-responsive" alt=""> <p>Contracarátula<br>45 x 29 cm.</p> </section>
						<section class="col-xs-12 col-sm-4 col-md-4 text-center"> <img src="{{asset('img/doble.png')}}" class="img-responsive" alt=""> <p>Doble Página<br>45 x 29 cm.</p> </section>
						<section class="col-xs-12 col-sm-4 col-md-4 text-center"> <img src="{{asset('img/paginterior.png')}}" class="img-responsive" alt=""> <p>Página Interior | 1/2 Pag Horizontal<br>22.5 x 29 cm. | 20 x 13 cm.</p> </section>
					</div>

					<h1>Sitio Web:</h1>
					<div class="row">
						<section class="col-xs-12 col-sm-6 col-md-6"><img src="{{asset('img/60k.png')}}" class="img-responsive" alt=""></section>
						<section class="col-xs-12 col-sm-6 col-md-6"><img src="{{asset('img/270k.png')}}" class="img-responsive" alt=""></section>
					</div>

					<h1>Boletín Electrónico:</h1>
					<div class="row">
						<section class="col-xs-12 col-sm-6 col-md-6 text-center"> <img src="img/60mil.png" alt=""> <p>Correos de manera diaria</p> </section>
						<section class="col-xs-12 col-sm-6 col-md-6 text-center"> <img src="img/19mil.png" alt=""> <p>Personas que leen el boletín</p> </section>
					</div>
				</section>


				

			</section>
			<!-- COLUMNA ASIDE -->
			<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">

				<!-- BANNER LATERAL -->
				<div class="fila sectoradjust">
					<div class="lateralbanner">
						<div class="sponsored">Publicidad</div>
						<img src="{{asset('banner/expodeco2018.gif')}}" alt="">
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