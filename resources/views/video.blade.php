@extends('layouts.front')
@section('titulo')
{{$post->titulo}}
@endsection
@section('content')
<!-- CONTENIDO -->
<div class="fila topadjust flexaligner">
	<div class="container">
		<div class="mainfoto">
			<iframe src="https://www.youtube.com/embed/{{$post->video->urlvideo}}" height="600" width="100%" frameborder="0"></iframe>
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
						<div class="share" data-href="http://www.dossierdearquitectura.com/2019/noticia.html" data-layout="button" data-size="small" data-mobile-iframe="false">
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.dossierdearquitectura.com%2F2019%2Fnoticia.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
								<i class="fab fa-facebook-f"></i>
							</a>
						</div>
						<div class="share"> <a href="#"><i class="far fa-envelope"></i></a> </div>
					</div>
				</div>
				<!-- DATOS DE COMPARTIR -->

				<p>{{$post->descripcion}}</p>
				<p>hjhg</p>
				<h5>Fuente:</h5>
			</div>

			<div class="fila sectoradjust">
				<section class="sectiontitulo">FOTOS</section>
				<div class="fotosextra">
					<a class="example-image-link" href="post/noticia.jpg" data-lightbox="example-set" data-title=""><img class="example-image" src="post/noticia.jpg" alt=""/></a>
					<a class="example-image-link" href="post/noticia.jpg" data-lightbox="example-set" data-title=""><img class="example-image" src="post/noticia.jpg" alt=""/></a>
					<a class="example-image-link" href="post/noticia.jpg" data-lightbox="example-set" data-title=""><img class="example-image" src="post/noticia.jpg" alt=""/></a>
					<a class="example-image-link" href="post/noticia.jpg" data-lightbox="example-set" data-title=""><img class="example-image" src="post/noticia.jpg" alt=""/></a>
					<a class="example-image-link" href="post/noticia.jpg" data-lightbox="example-set" data-title=""><img class="example-image" src="post/noticia.jpg" alt=""/></a>
				</div>
			</div>

			<div class="fila sectoradjust">
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
			</div>

			<div class="fila sectoradjust">
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
			</div>


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


			{{-- <div class="fila sectoradjust">
				<section class="sectiontitulo">TENDENCIAS</section>									
				
				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">1</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">2</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">3</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">4</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>

				<div class="trending bottomline" style="display: flex;">
					<section class="col-xs-3 col-sm-3 col-md-1 flexrank">5</section>
					<section class="col-xs-9 col-sm-9 col-md-11 bannerfila">
						<section class="titlerank">	<a href="#">Presentan en Chile "inmobiliaria popular" que arrendará viviendas a familias vulnerables</a> </section>
						<section class="imagerank">
							<img src="post/noticia.jpg" alt="">
						</section>
					</section>
				</div>
			</div>
 --}}
			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="banner/expodeco2018.gif" alt="">
				</div>
			</div>
			<!-- BANNER LATERAL -->


			<div class="fila sectoradjust">
				<div class="suscription">
					<section class="sectiontitulo">Suscríbete al Dossier de Arquitectura</section>
					<div class="row">

						<section class="col-xs-12 col-sm-8 col-md-8">								
							<h4>ESPACIOS CORPORATIVOS</h4>
							Presentamos las últimas novedades en Espacios Corporativos Ed. 35
							<div class="fila topadjust">
								<button type="button" class="btn btn-default">Comprar</button>
								<button type="button" class="btn btn-success">Suscribirse</button>
							</div>
						</section>
						<section class="col-xs-12 col-sm-4 col-md-4">								
							<img src="edicion/portada35.png" class="img-responsive" alt="">
						</section>
						
						
					</div>
				</div>
			</div>

			<div class="fila sectoradjust">
				<section class="sectiontitulo bottomline">EXPLORAR</section>
				@include('layouts.explorar')
			</div>

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="banner/expodeco2018.gif" alt="">
				</div>
			</div>
			<!-- BANNER LATERAL -->

			<!-- BANNER LATERAL -->
			<div class="fila sectoradjust">
				<div class="lateralbanner">
					<div class="sponsored">Publicidad</div>
					<img src="banner/expodeco2018.gif" alt="">
				</div>
			</div>
			<!-- BANNER LATERAL -->



		</section>
		<!-- COLUMNA ASIDE -->
	</div>
</div>
<!-- CONTENIDO -->
@endsection