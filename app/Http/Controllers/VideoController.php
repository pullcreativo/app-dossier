<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tema;
use App\Video;
use Illuminate\Http\Request;
use Session;
class VideoController extends Controller
{
    /*Lista de videos*/
    public function index()
    {
    	$videos = Video::orderBy('idvideo','desc')->paginate(10);
    	return view('video.index',compact('videos'));
    }
    /*Formulario de creacion*/
    public function create()
    {
    	$temas = Tema::all();
    	return view('video.create',compact('temas'));
    }
    /*Guardar video*/
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'titulo'=>'required','descripcion'=>'required','urlvideo'=>'required','portada'=>'required|mimes:jpg,png,jpeg'
    	]);

    	//Recuperando la extension de la imagen
    	$extension =$request->file('portada')->getClientOriginalExtension();
    	$imgnombre= $this->str_unico(8).'.'.$extension;
    	if ($request->file('portada')->move(public_path().'/imgPosts/',$imgnombre)) {

    		//Creando slug desde el campo titulo
    		$slug =Post::create_slug($request->titulo);

    		//guardando en la tabla posts
    		$post = new Post();
    		$post->idtema = $request->tema;
    		$post->titulo = $request->titulo;
    		$post->descripcion = $request->descripcion;
    		$post->urlfoto= $imgnombre;
    		$post->fechapub = date("Y-m-d H:i:s");
    		$post->idtipo = 3;
    		$post->slug = $slug;
    		$post->save();

    		//guardando en la tabla videos
    		$video = new Video();
    		$video->idpost = $post->idpost;
    		$video->urlvideo = $request->urlvideo;
    		$video->priority = $request->priority;
    		$video->save();


    		Session::flash('msg','El registro se guardo con éxito!');
    		return redirect()->route('videos.index');
    	}
    }
    /*Formualario de edicion, parametro idvideo*/
    public function edit($id)
    {
    	$temas = Tema::all();
    	$video = Video::find($id);
    	return view('video.edit',compact('temas','video'));
    }
    /*Actualizar el evento*/
    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'titulo'=>'required','descripcion'=>'required','urlvideo'=>'required'
    	]);
    	$post = Post::find($id);
    	$video = Video::where('idpost','=',$id)->first();

    	if ($request->file('portada')) {
    	    $this->validate($request,[
    	        'portada'=>'mimes:jpg,png,jpeg|max:150'
    	        ]);

    	    //Borramos el archivo anterior
    	    unlink(public_path().'/imgPosts/'.$post->urlfoto);
    	    //Recuperando la extension de la imagen
    	    $extension =$request->file('portada')->getClientOriginalExtension();
    	    $imgnombre= $this->str_unico(8).'.'.$extension;
    	    if ($request->file('portada')->move(public_path().'/imgPosts/',$imgnombre)) {
    	        $post->urlfoto = $imgnombre;
    	    }
    	}
    	//actualizamos el slug
    	if ($request->titulo !=$post->titulo) {
    	    $slugupdate = Post::create_slug($request->titulo);

    	    $post->titulo = $request->titulo;
    	    $post->slug = $slugupdate;
    	}
    	$post->idtema = $request->tema;
    	$post->descripcion = $request->descripcion;
    	$post->save();

    	//Actualizando en la tabla videos
    	$video->urlvideo = $request->urlvideo;
    	$video->priority = $request->priority;
    	$video->save();
    	

    	Session::flash('msg','El registro se actualizó con éxito!');
    	return redirect()->route('videos.index');
    }
    //funcion que retorna un string unico recibe como parametro la longitud
    private function str_unico($l)
    {
        $keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length = $l;
        $randkey = "";
        $max=strlen($keychars)-1;

        for ($i=0;$i<$length;$i++) {

        $randkey .= substr($keychars, rand(0, $max), 1);
        }
        return time().$randkey;
    }
}
