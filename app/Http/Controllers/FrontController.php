<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Evento;
use App\Mail\Contacto;
use App\Noticia;
use App\Post;
use App\PostVista;
use App\Producto;
use App\Tema;
use App\Video;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class FrontController extends Controller
{
	public function __construct(){
	    Carbon::setLocale('es');
	}
    public function index()
    {
    	$temas = Tema::all();
    	$mainnot = Noticia::where('priority','=',1)->orderBy('idnoticia','desc')->first();

    	$bloque1 = Post::where('idpost','<>',$mainnot->post->idpost)->limit(4)->offset(0)->orderBy('idpost','desc')->get();
        //contar cantidad de noticias en el primer bloque
        $cant_notice = $bloque1->where('idtipo','=',1)->count();

    	$bloque2 = Post::where('idpost','<>',$mainnot->post->idpost)->where('idtipo','=',1)->limit(4)->offset($cant_notice)->orderBy('idpost','desc')->get();

    	$videoP = Video::where('priority','=',1)->orderBy('idvideo','desc')->first();

        $productos = Producto::join('fotos as f','f.iditem','=','productos.idproducto')
        ->join('marcas as m','productos.id_marca','=','m.id_marca')
        ->where('f.principal','=',1)->orderByRaw('RAND()')->limit(4)->get();

        $trendings = PostVista::orderBy('cant_visto','desc')->limit(5)->get();


    	return view('index',compact('temas','mainnot','bloque1','bloque2','videoP','trendings','productos'));
    }
    /*ver lista de noticias*/
    public function getNoticias()
    {
    	$temas = Tema::all();
    	$noticias = Noticia::orderBy('idnoticia','desc')->paginate(20);
    	return view('noticias',compact('temas','noticias'));
    }
    /*ver lista de eventos*/
    public function getEventos()
    {
        $temas = Tema::all();
        $eventos = Evento::orderBy('idevento','desc')->paginate(20);
        
        return view('eventos',compact('temas','eventos'));
    }
    /*Formulario de contacto*/
    public function formContact()
    {
        $temas = Tema::all();
        return view('contacto',compact('temas'));
    }
    /*ver lista de ediciones*/
    public function getEditions()
    {
        $temas = Tema::all();
        $editions = Edition::orderBy('nro_edition','desc')->paginate(20);
        return view('editions',compact('temas','editions'));
    }
    /*ver detalle de la post*/
    public function getPost($slug)
    {

    	$temas = Tema::all();
    	$post = Post::where('slug','=',$slug)->first();

        //validando si el post no existe en la tabla post_vistas
        $newpost = DB::table('posts')->select('*')->where('idpost','=',$post->idpost)->whereNotIn('idpost',function($query) {

           $query->select('idpost')->from('post_vistas');

        })->count();

        //Si es mayor que 0 aun no tiene vistas
        if ($newpost > 0) {

            $vista = new PostVista();
            $vista->idpost = $post->idpost;
            $vista->cant_visto =1;
            $vista->save();
            
        }else{
            $vistasup = PostVista::where('idpost','=',$post->idpost)->first();
            $vistasup->cant_visto ++;
            $vistasup->save();

        }

        $relations = Post::where([['idtema','=',$post->tema->idtema],['idpost','<>',$post->idpost]])->orderBy('idpost','desc')->limit(3)->get(); 

    	if ($post->idtipo == 1) {
    		return view('noticia',compact('post','temas','relations'));
    	}elseif ($post->idtipo ==2) {
    		return view('evento',compact('post','temas','relations'));
    	}else{
    		return view('video',compact('post','temas','relations'));
    	}
    	
    }
    /*ver posts filtrador por tema: parametro slug del tema*/
    public function getPostTema($slug)
    {
        $temas = Tema::all();

        $tema = Tema::where('slug','=',$slug)->first();
        $posts = Post::where('idtema','=',$tema->idtema)->orderBy('idpost','desc')->paginate(20);

        /*$posts = DB::table('posts as p')
        ->join('temas as t','p.idtema','=','t.idtema')
        ->select('p.titulo','p.slug','p.descripcion','p.fechapub','p.urlfoto','t.tema')
        ->where('t.slug','=',$slug)->paginate(20);*/

        return view('poststema',compact('posts','temas'));
    }
    public function saveContact(Request $request)
    {
        $this->validate($request,[
            'nombres'=>'required','email'=>'required|email',
            'telefono'=>'required|numeric','comentario'=>'required',
            'terminos'=>'required'
            ],[
            'nombres.required'=>'Ingrese Nombres y Apellidos',
            'email.required'=>'Ingrese correo electronico',
            'email.email'=>'Correo no válido',
            'comentario.required'=>'Ingrese Comentario',
            'terminos.required'=>'Maraca este campo para evitar Spam'
            ]);

        //to: info@constructivo.com
        Mail::to('asistencia@pullcreativo.com','Katherine')
                ->send(new Contacto($request));

        return back()->with('message','Informacion enviada con éxito');
    }
}
