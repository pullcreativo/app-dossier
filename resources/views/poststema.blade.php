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
						<a href="{{route('getPost',$post->slug)}}"><img src="{{asset('imgPosts/'.$post->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$post->tema->tema}}</h3>
							<a href="{{route('getPost',$post->slug)}}"><h2>{{$post->titulo}}</h2></a>
							<span>{{$post->typePost()}}</span><br>
							<p>{!! substr($post->descripcion, 0,150) !!} ...</p>
							<span>Publicado {{ \Carbon\Carbon::parse($post->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
				</div>
			</div>
			@endforeach
			{!! $posts->render() !!}

		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-3 hidden-xs">
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