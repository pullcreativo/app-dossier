<form action="http://sga.pullcreativo.com/visitante/boletin" method="GET">
	{{ csrf_field() }}
	<input type="hidden" name="medio" value="DA">
	<div class="form-group">
		<label for="email" class="control-label">Suscríbete al Boletín de Noticias</label>
		<div class="input-group">
			<input type="email" name="email" class="form-control" placeholder="Ingrese su correo" required>
			<span class="input-group-btn">
			        <button type="submit" class="btn btn-primary">Ok</button>
			 </span>
		</div>
	</div>
</form>
<div class="fila topadjust text-center"><a target="_blank" href="http://www.pullcreativo.com/envios-dossier/newsletter/" class="btn btn-success btn-xs">Ver último Boletín</a></div>