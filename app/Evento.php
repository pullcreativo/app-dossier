<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $primaryKey= 'idevento';
    protected $fillable =['idpost','fechaini','datos','destacado'];

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo('App\Post','idpost');
    }
}
