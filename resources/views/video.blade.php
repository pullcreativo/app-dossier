@extends('layouts.front')
@section('titulo')
{{$post->titulo}}
@endsection
@section('content')
<!-- CONTENIDO -->
<div class="fila topadjust flexaligner">
	<div class="contenedor">
		<div class="mainfoto">
			<iframe src="https://www.youtube.com/embed/{{$post->video->urlvideo}}" height="600" width="100%" frameborder="0"></iframe>
		</div>
	</div>
</div>


<div class="fila sectoradjust">
	<div class="contenedor">
		<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-9 rightline">
			<div class="detallepost">
				<h3>{{$post->tema->tema}}</h3>
				<h1>{{$post->titulo}}</h1>
				<span>Publicado {{ \Carbon\Carbon::parse($post->fechapub)->diffForHumans()}}</span>

				<!-- DATOS DE COMPARTIR -->
				<div class="fila topadjust">
					<div class="row flexaligner">
						<div class="share"> 9 <a href="#"><i class="far fa-thumbs-up"></i></a></div>
						<div class="share"> 11 <i class="far fa-comment"></i></div>
						<div class="share" data-href="{{url('post/'.$post->slug)}}" data-layout="button" data-size="small" data-mobile-iframe="false">
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('post/'.$post->slug)}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
								<i class="fab fa-facebook-f"></i>
							</a>
						</div>
						<div class="share"> <a href="#"><i class="far fa-envelope"></i></a> </div>
					</div>
				</div>
				<!-- DATOS DE COMPARTIR -->

				<p>{{$post->descripcion}}</p>
			</div>

			{{-- <div class="fila sectoradjust">
				<section class="sectiontitulo">COMENTARIOS</section>
				<div class="comentario">					

					<div class="row topadjust">
						<section class="col-xs-2 col-sm-3 col-md-2"><img src="img/user-male.jpg" class="img-responsive img-thumbnail" alt=""></section>
						<section class="col-xs-10 col-sm-9 col-md-10">
							<div class="datacomment">
								<h1>Paolo Carranza Servat</h1>
								<span>8-Febrero-2017 - 12:32:56 pm</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus doloremque eveniet veniam, itaque dolorum, ullam fugit reiciendis assumenda fugiat quos odio aliquam adipisci similique voluptatem nihil asperiores cumque, molestiae, sint!</p>
							</div>
						</section>
					</div>

					<div class="row topadjust">
						<section class="col-xs-2 col-sm-3 col-md-2"><img src="img/user-female.jpg" class="img-responsive img-thumbnail" alt=""></section>
						<section class="col-xs-10 col-sm-9 col-md-10">
							<form>
							  <div class="form-group">							    						    
							    <textarea class="form-control"  name="comment" id="comment" placeholder="Ingrese su comentario" rows="3"></textarea>
							  </div>
							  <button type="submit" class="btn btn-success">Enviar</button>
							</form>
						</section>
					</div>


				</div>
			</div> --}}


			<div class="fila sectoradjust">
				<section class="sectiontitulo">ARTÍCULOS RELACIONADOS</section>
				<div class="row">
					@foreach($relations as $rela)
					<section class="col-xs-12 col-sm-12 col-md-4">
						<div class="related">
							<img src="{{asset('imgPosts/'.$rela->urlfoto)}}" alt="">
							<span>Publicado {{ \Carbon\Carbon::parse($rela->fechapub)->diffForHumans()}}</span>
							<a href="{{route('getPost',$rela->slug)}}"><h2>{{$rela->titulo}}</h2></a>
							<span>{{$rela->typePost()}}</span><br>
							<p>{!! substr($rela->descripcion, 0,70) !!} ...</p>
						</div>
					</section>
					@endforeach
				</div>
			</div>



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
			<!-- PRODUCTOS DESTACADOS - ZONA WEB INTERIORES -->
			<div class="fila sectoradjust">
				<section class="sectiontitulo">PRODUCTOS DESTACADOS</section>

				<div class="fila topadjust">
					@foreach($productos as $prod)
					<div class="media">
					  <div class="media-left">
					    <a target="_blank" href="http://arquiproductos.com/producto.php?idprod={{$prod->idproducto}}">
					      <img class="media-object" src="https://www.arquiproductos.com/{{$prod->url_foto}}" width="64" alt="{{$prod->nom_producto}}">
					    </a>
					  </div>
					  <div class="media-body">
					    <a target="_blank" href="http://arquiproductos.com/producto.php?idprod={{$prod->idproducto}}"><h4 class="media-heading">{{$prod->nom_producto}}</h4></a><span>{{$prod->nom_marca}}</span>
					  </div>
					</div>
					@endforeach

					<div class="fila topadjust text-center">
						<a href="#" class="btn btn-success btn-xs">Visitar Web</a>
					</div>
				</div>					
			</div>
			<!-- PRODUCTOS DESTACADOS - ZONA WEB INTERIORES -->

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