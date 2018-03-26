@extends('layouts.front')
@section('titulo')
Resultados de búsqueda
@endsection
@section('content')
<!-- CONTENIDO -->
<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-9 rightline">

			<section class="sectiontitulo">Resultados de búsqueda</section>
			@if(count($results)>0)
			@foreach($results as $rs)
			<div class="extrapost">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<a href="#"><img src="{{asset('imgPosts/'.$rs->urlfoto)}}" class="img-thumbnail" alt=""></a>
					</section>
					<section class="col-xs-12 col-sm-7 col-md-8">
						<div class="postdata">
							<h3>{{$rs->tema->tema}}</h3>
							<p>{{$rs->titulo}}</p>
							<a href="{{route('getPost',$rs->slug)}}">{!! substr($rs->descripcion, 0,150) !!} ...</a><br>
							<span>Publicado {{ \Carbon\Carbon::parse($rs->fechapub)->diffForHumans()}} - <i class="far fa-thumbs-up"></i> 9</span>
						</div>
					</section>
				</div>
			</div>
			@endforeach
			@else
			<div class="extrapost">
				<div class="row">
					<section class="col-sx-12 col-sm-5 col-md-4">
						<span>No hay resultados para su búsqueda</span>
					</section>
					
				</div>
			</div>
			@endif
			
			{!! $results->render() !!}

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