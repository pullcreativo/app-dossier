@extends('layouts.front')
@section('titulo')
Eventos
@endsection
@section('content')
<!-- CONTENIDO -->

<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-8 rightline">

			<section class="sectiontitulo bottomline">EVENTOS</section>
			@foreach($eventos as $event)
			<div class="fila topadjust bottomline">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<a href="{{route('getPost',$event->post->slug)}}"><img src="{{asset('imgPosts/'.$event->post->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$event->post->tema->tema}}</h3>
							<a href="{{route('getPost',$event->post->slug)}}"><h2>{{$event->post->titulo}}</h2></a>
							<p>{!! substr($event->post->descripcion, 0,150) !!} ...</p>
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