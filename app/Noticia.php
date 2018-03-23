<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $primaryKey = 'idnoticia';
    protected $fillable =['idpost','contenido','fuente','priority'];

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo('App\Post','idpost');
    }
}
