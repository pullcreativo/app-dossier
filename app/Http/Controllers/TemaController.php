<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;
use App\Post;
class TemaController extends Controller
{
    /*Guardar tema*/
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'tema'=>'required|string|max:100'
    	]);
        //Creando slug desde el campo tema
        $slug =Post::create_slug($request->tema);

    	$tema = new Tema();
        $tema->tema = $request->tema;
        $tema->slug = $slug;
        $tema->save();

    	return response()->json([
    		'message'=>'Registro guardado con éxito!'
    	]);
    }
}
