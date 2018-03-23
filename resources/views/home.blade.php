@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Entradas recientes</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <th>Tipo</th>
                    <th>Tema</th>
                    <th>Titulo</th>
                    <th>imagen</th>
                    <th>Fecha</th>
                    <th>Control</th>
                </thead>
                @foreach($posts as $post)
                <tbody>
                    @if($post->idtipo ==1)
                    <td class="success">Noticia</td>
                    @elseif($post->idtipo ==2)
                    <td class="danger">Evento</td>
                    @else
                    <td class="info">Video</td>
                    @endif
                    <td>{{$post->tema->tema}}</td>
                    <td><strong>{{$post->titulo}}</strong></td>
                    <td>
                        <img class="img-responsive" width="100" src="{{asset('imgPosts/'.$post->urlfoto)}}" alt="">
                    </td>
                    <td>{{ date("d/m/Y g:ia",strtotime($post->fechapub))}}</td>
                    <td width="200">
                        @if($post->idtipo ==1)
                        <a href="{{route('noticias.edit',$post->noticia->idnoticia)}}" class="btn btn-primary btn-sm">Editar</a>
                        @elseif($post->idtipo ==2)
                        <a href="{{route('eventos.edit',$post->evento->idevento)}}" class="btn btn-primary btn-sm">Editar</a>
                        @else
                        <a href="{{route('videos.edit',$post->video->idvideo)}}" class="btn btn-primary btn-sm">Editar</a>
                        @endif
                        
                        <a href="{{route('posts.delete',$post->idpost)}}" onclick="return confirm('ADVERTENCIA:\n¿Seguro de eliminar el registro?')" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
        </div>
        <div class="panel-footer">
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
