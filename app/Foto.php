<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $primaryKey ='idfoto';
    protected $fillable =['urlfoto','idpost'];

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo('App\Post','idpost');
    }
}
