<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostVista extends Model
{
    protected $table ='post_vistas';
    protected $fillable =['idpost','cant_visto'];

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo('App\Post','idpost');
    }
}
