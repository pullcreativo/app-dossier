<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Post;
use App\Tema;
use Illuminate\Http\Request;
use Session;

class EventoController extends Controller
{
    /*Lista de eventos*/
    public function index()
    {
    	$eventos = 	Evento::orderBy('idevento','desc')->paginate(10);
    	return view('evento.index',compact('eventos'));
    }
    /*Formulario para crear evento*/
    public function create()
    {
    	$temas = Tema::all();
    	return view('evento.create',compact('temas'));
    }
    /*Guardar evento*/
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'titulo'=>'required','descripcion'=>'required','contenido'=>'required','fechaini'=>'required','portada'=>'required|mimes:jpg,png,jpeg'
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
    		$post->idtipo = 2;
    		$post->slug = $slug;
    		$post->save();

    		//guardando en la tabla eventos
    		$evento = new Evento();
    		$evento->idpost =$post->idpost;
    		$evento->fechaini = $request->fechaini;
    		$evento->datos = $request->contenido;
    		$evento->destacado = $request->destacado;
    		$evento->save();


    		Session::flash('msg','El registro se guardo con éxito!');
    		return redirect()->route('eventos.index');
    	}
    }
    /*formualario de edicion, parametro id del evento*/
    public function edit($id)
    {
    	$temas = Tema::all();
    	$evento = Evento::find($id);
    	return view('evento.edit',compact('temas','evento'));

    }
    /*actualizar evento*/
    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'titulo'=>'required','descripcion'=>'required','contenido'=>'required','fechaini'=>'required',
    	]);
    	$post = Post::find($id);
    	$evento = Evento::where('idpost','=',$id)->first();

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

    	//Actualizando en la tabla eventos
    	$evento->fechaini = $request->fechaini;
    	$evento->datos = $request->contenido;
    	$evento->destacado = $request->destacado;
    	$evento->save();

    	Session::flash('msg','El registro se actualizó con éxito!');
    	return redirect()->route('eventos.index');
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
