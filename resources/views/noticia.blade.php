@extends('layouts.front')
@section('titulo')
{{$post->titulo}}
@endsection
@section('content')
<!-- CONTENIDO -->
<div class="fila topadjust flexaligner">
	<div class="container">
		<div class="mainfoto">
			<img src="{{asset('imgPosts/'.$post->urlfoto)}}" alt="">
		</div>
	</div>
</div>


<div class="fila sectoradjust">
	<div class="container">
		<section class="col-xs-12 col-sm-12 col-md-8 rightline">
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
				<p>{!! $post->noticia->contenido!!}</p>
				<h5>Fuente: {{$post->noticia->fuente}}</h5>
			</div>

			<div class="fila sectoradjust">
				<section class="sectiontitulo">FOTOS</section>
				<div class="fotosextra">
					@foreach($post->fotos as $foto)
					<a class="example-image-link" href="{{asset('imgPosts/'.$foto->urlfoto)}}" data-lightbox="example-set" data-title=""><img class="example-image" src="{{asset('imgPosts/'.$foto->urlfoto)}}" alt=""/></a>
					@endforeach
					
				</div>
			</div>

			{{-- <div class="fila sectoradjust">
				<section class="sectiontitulo">VIDEOS</section>
				<div class="fotosextra">						
					<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><img class="example-image" src="post/video.jpg" alt=""/></a>
					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
					  <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					    	<iframe width="100%" height="480" src="https://www.youtube.com/embed/9SQfKYZsIXA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					    </div>
					  </div>
					</div>
				</div>
			</div> --}}

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
							<h1>{{$rela->titulo}}</h1>
							<span>{{$rela->typePost()}}</span><br>
							<a href="{{route('getPost',$rela->slug)}}">{!! substr($rela->descripcion, 0,70) !!} ...</a>
						</div>
					</section>
					@endforeach
				</div>
			</div>



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