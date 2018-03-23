<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey ='idpost';
    protected $fillable =['idtema','titulo','descripcion','urlfoto','fechapub','idtipo','slug'];

    public $timestamps = false;

    public function tema()
    {
    	return $this->belongsTo('App\Tema','idtema');
    }
    public function noticia()
    {
    	return $this->hasOne('App\Noticia','idpost');
    }
    public function evento()
    {
        return $this->hasOne('App\Evento','idpost');
    }
    public function video()
    {
        return $this->hasOne('App\Video','idpost');
    }
    public function vistas()
    {
        return $this->hasMany('App\PostVista','idpost');
    }
    public function fotos()
    {
        return $this->hasMany('App\Foto','idpost');
    }
    //funcion que devuelve tipo
    public function typePost()
    {
        $nomtipo = '';
        if ($this->idtipo == 1) {
            $nomtipo ='Historia';
        }elseif ($this->idtipo == 2) {
            $nomtipo ='Evento';
        }else{
            $nomtipo ='Video';
        }
        return $nomtipo;
    }
    //metodo publico y statico para crear slug esto sera llamado por los controladores que usen este modelo
    public static function create_slug($string, $replace = array(), $delimiter = '-'){
        // Validacion de acotejamiento utf-8
        if (!extension_loaded('iconv')) {
          throw new Exception('iconv module not loaded');
        }
        // Obtener cotejamiento por defecto y pasar a UTF-8
        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        if (!empty($replace)) {
          $clean = str_replace((array) $replace, ' ', $clean);
        }
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower($clean);
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        $clean = trim($clean, $delimiter);
        // Revert back to the old locale
        setlocale(LC_ALL, $oldLocale);
        //Concatenando con el time
        return $clean.'-'.time();
    }
}
