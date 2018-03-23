<?php

namespace App\Http\Controllers;

use App\Noticia;
use App\Post;
use App\Tema;
use Illuminate\Http\Request;
use Session;
class NoticiaController extends Controller
{
	/*Lista de noticias*/
	public function index()
	{
		$noticias = Noticia::orderBy('idnoticia','desc')->paginate(10);
		return view('noticia.index',compact('noticias'));
	}
    /*Formulario de creacion de noticias*/
    public function create()
    {
    	$temas = Tema::all();

    	return view('noticia.create',compact('temas'));
    }
    /*Guardar noticia*/
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'titulo'=>'required',
    		'descripcion'=>'required',
    		'contenido'=>'required',
    		'fuente'=>'required',
    		'portada'=>'required|mimes:jpg,png,jpeg'
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
    		$post->idtipo = 1;
    		$post->slug = $slug;
    		$post->save();

    		//guardando en la tabla noticias
    		$noticia = new Noticia();
    		$noticia->idpost = $post->idpost;
    		$noticia->contenido = $request->contenido;
    		$noticia->fuente = $request->fuente;
            $noticia->priority = $request->priority;
    		$noticia->save();

    		Session::flash('msg','El registro se guardo con éxito!');
    		return redirect()->route('noticias.index');
    	}
    }
    /*Formualario para editar noticia, parametro id*/
    public function edit($id)
    {
    	$temas = Tema::all();
    	$noticia = Noticia::find($id);
    	return view('noticia.edit',compact('noticia','temas'));
    }
    /*Mostrar detalle*/
    public function show($id)
    {
        $post = Post::find($id);

        return view('noticia.show',compact('post'));
    }
    /*Actualizar noticia, parametro idpost*/
    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'titulo'=>'required',
    		'descripcion'=>'required',
    		'contenido'=>'required',
    		'fuente'=>'required',
    	]);

    	$post = Post::find($id);
    	$noticia = Noticia::where('idpost','=',$id)->first();
    	
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

    	//Actualizando en la tabla noticias
    	$noticia->contenido = $request->contenido;
    	$noticia->fuente = $request->fuente;
        $noticia->priority = $request->priority;
    	$noticia->save();

    	Session::flash('msg','El registro se actualizó con éxito!');
    	return redirect()->route('noticias.index');
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
