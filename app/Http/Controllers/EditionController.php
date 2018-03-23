<?php

namespace App\Http\Controllers;

use App\Article;
use App\Edition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
class EditionController extends Controller
{
	public function __construct(){
	    Carbon::setLocale('es');
	}
    public function index()
    {
    	$editions = Edition::orderBy('idedicion','desc')->paginate(20);
    	return view('edition.index',compact('editions'));
    }
    public function create()
    {
    	return view('edition.create');
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nro_edition'=>'required|numeric',
    		'name_pub'=>'required',
    		'editorial'=>'required',
    		'autor'=>'required',
    		'portada'=>'required|mimes:jpg,png,jpeg|max:160'

    	]);
    	//Recuperando la extension de la imagen
    	$extension =$request->file('portada')->getClientOriginalExtension();
    	$imgnombre= $this->str_unico(8).'.'.$extension;
    	if ($request->file('portada')->move(public_path().'/imgPosts/',$imgnombre)) {

    		$edition = new Edition();
    		$edition->nro_edition = $request->nro_edition;
    		$edition->name_pub = $request->name_pub;
    		$edition->editorial = $request->editorial;
    		$edition->autor = $request->autor;
    		$edition->fechapub = $request->fechapub;
    		$edition->portada = $imgnombre;
    		$edition->save();
    	}
    	Session::flash('msg','Registro guardado con éxito');

    	return redirect()->route('editions.index');
    }
    public function edit($id)
    {
    	$edition = Edition::find($id);

    	return view('edition.edit',compact('edition'));
    }
    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'nro_edition'=>'required|numeric',
    		'name_pub'=>'required',
    		'editorial'=>'required',
    		'autor'=>'required',
    	]);

    	$edition = Edition::find($id);

    	if ($request->file('portada')) {
    		$this->validate($request,[
    			'portada'=>'mimes:jpg,png,jpeg|max:150'
    		]);
    		//Borramos el archivo anterior
    		unlink(public_path().'/imgPosts/'.$edition->portada);
    		//Recuperando la extension de la imagen
    		$extension =$request->file('portada')->getClientOriginalExtension();
    		$imgnombre= $this->str_unico(8).'.'.$extension;
    		if ($request->file('portada')->move(public_path().'/imgPosts/',$imgnombre)) {
    		    $edition->portada = $imgnombre;
    		}

    	}

    	$edition->nro_edition = $request->nro_edition;
    	$edition->name_pub =$request->name_pub;
    	$edition->editorial = $request->editorial;
    	$edition->autor = $request->autor;
    	$edition->fechapub = $request->fechapub;
    	$edition->save();

    	Session::flash('msg','Registro actualizado con éxito');

    	return redirect()->route('editions.index');
    }
    public function delete($id)
    {
    	return "delete";
    }
    /*Listar articulos de la edicion a traves de idedicion*/
    public function getArticles($id)
    {
    	$edition = Edition::find($id);
    	$articles = Article::where('idedicion','=',$id)->orderBy('idarticulo','desc')->get();
    	return view('edition.articles',compact('articles','edition'));
    }
    public function saveArticle(Request $request)
    {
    	$this->validate($request,[
    		'titulo'=>'required',
    		'contenido'=>'required',
    		'portada'=>'required|mimes:jpg,png,jpeg|max:150'
    	]);
    	//Recuperando la extension de la imagen
    	$extension =$request->file('portada')->getClientOriginalExtension();
    	$imgnombre= $this->str_unico(8).'.'.$extension;
    	if ($request->file('portada')->move(public_path().'/imgPosts/',$imgnombre)) {

    		$article = new Article();
    		$article->idedicion =$request->idedicion;
    		$article->titulo = $request->titulo;
    		$article->contenido = $request->contenido;
    		$article->imagen = $imgnombre;
    		$article->save();
    	}
    	Session::flash('msg','Registro hecho con éxito');

    	return redirect()->back();

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
