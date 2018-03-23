<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Post;
use Session;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('idpost','desc')->paginate(10);
        return view('home',compact('posts'));
    }
    /*Metodo para eliminar un post*/
    public function delete($id)
    {
        $post = Post::find($id);
        unlink(public_path().'/imgPosts/'.$post->urlfoto);

        $post->delete();

        return back()->with('msg','El registro se eliminó con éxito!');
    }
    /*Metodo para guardar foto extra del post*/
    public function saveFoto(Request $request)
    {
        $this->validate($request,[
            'portada'=>'required|mimes:jpg,png,jpeg|max:160'
        ]);
        //Recuperando la extension de la imagen
        $extension =$request->file('portada')->getClientOriginalExtension();
        $imgnombre= $this->str_unico(8).'.'.$extension;
        if ($request->file('portada')->move(public_path().'/imgPosts/',$imgnombre)) {
            $foto = new Foto();
            $foto->urlfoto = $imgnombre;
            $foto->idpost = $request->idpost;
            $foto->save();

            Session::flash('msg','Registro hecho con éxito');

            return redirect()->back();
        }else{
            dd('No se pudo subir la imagen');
        }
        
    }
    public function revomeFoto($id)
    {
        $foto = Foto::find($id);
        unlink(public_path().'/imgPosts/'.$foto->urlfoto);
        $foto->delete();
        Session::flash('msg','El registro se eliminó con éxito');

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
