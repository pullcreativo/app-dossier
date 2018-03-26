@extends('layouts.front')
@section('titulo')
Nuestras ediciones
@endsection
@section('content')
<!-- CONTENIDO -->

<div class="fila sectoradjust">
	<div class="container">
		<section class="col-xs-12 col-sm-12 col-md-8 rightline">
			<section class="sectiontitulo bottomline">EDICIONES</section>

			<div class="fila topadjust flexspacer">
				@foreach($editions as $edit)
				<div class="edicion text-center">
					<h1>Dossier {{$edit->nro_edition}}</h1>
					<a href="#"><img src="{{asset('imgPosts/'.$edit->portada)}}" alt=""></a>
					<span>{{$edit->getMes_Name()}} {{date('Y',strtotime($edit->fechapub))}}</span>
				</div>
				@endforeach
			</div>
			{!! $editions->render() !!}

		</section>
		<!-- COLUMNA ASIDE -->
		<section class="col-xs-12 col-sm-12 col-md-4 hidden-xs">
			
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
<!-- CONTENIDO -->
@endsection