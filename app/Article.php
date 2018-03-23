<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ='articulos';
    protected $primaryKey ='idarticulo';
    protected $fillable =['idedicion','titulo','contenido','imagen'];

    public $timestamps = false;

    public function edition()
    {
    	return $this->belongsTo('App\Edition','idedicion');
    }
}
