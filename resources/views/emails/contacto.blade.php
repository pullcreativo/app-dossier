@component('mail::message')
# Hola!

<p>Datos de contacto</p>


<table>
	<tr>
		<th>Nombres</th>
		<td>{{$data->nombres}}</td>
	</tr>
	<tr>
		<th>Email</th>
		<td>{{$data->email}}</td>
	</tr>
	<tr>
		<th>Teléfono</th>
		<td>{{$data->telefono}}</td>
	</tr>
	<tr>
		<th>Empresa</th>
		<td>{{$data->empresa}}</td>
	</tr>
	<tr>
		<th>Cargo</th>
		<td>{{$data->cargo}}</td>
	</tr>
	<tr>
		<th>Mensaje</th>
		<td>{{$data->comentario}}</td>
	</tr>
</table>

@endcomponent
