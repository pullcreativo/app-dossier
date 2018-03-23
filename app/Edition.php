<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table ='ediciones';
    protected $primaryKey ='idedicion';
    protected $fillable =['nro_edition','name_pub','editorial','autor','portada','pechapub'];

    public $timestamps = false;

    public function articles()
    {
    	return $this->hasMany('App\Article','idedicion');
    }
    public function getMes_Name()
    {
    	$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

    	$num_mes = date('n',strtotime($this->fechapub));
    	$mes = $meses[$num_mes -1];

    	return $mes;
    }
}



