<div class="temas adjuster">
	@foreach($temas as $tema)
	<section><a href="{{route('getPostTema',$tema->slug)}}">{{$tema->tema}}</a></section>
	@endforeach					
</div>