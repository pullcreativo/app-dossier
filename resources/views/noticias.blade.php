@extends('layouts.front')
@section('titulo')
Historias
@endsection
@section('content')
<!-- CONTENIDO -->



<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-9 rightline">

			<section class="sectiontitulo">HISTORIA RECIENTES</section>
			@foreach($noticias as $notice)
			<div class="extrapost">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<a href="#"><img src="{{asset('imgPosts/'.$notice->post->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$notice->post->tema->tema}}</h3>
							<a href="{{route('getPost',$notice->post->slug)}}"><h2>{{$notice->post->titulo}}</h2></a>
							<p>{!! substr($notice->post->descripcion, 0,150) !!} ...</p>
							<span>Publicado {{ \Carbon\Carbon::parse($notice->post->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
				</div>
			</div>
			@endforeach

			{!! $noticias->render() !!}

		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="{{asset('banner/expodeco2018.gif')}}" alt="Banner expodeco">
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
					<img src="{{asset('banner/expodeco2018.gif')}}" alt="Banner expodeco">
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="{{asset('banner/expodeco2018.gif')}}" alt="Banner expodeco">
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