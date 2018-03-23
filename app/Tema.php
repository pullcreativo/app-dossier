<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $primaryKey ='idtema';
    protected $fillable =['tema','slug'];

    public $timestamps = false;

    public function posts()
    {
    	return $this->hasMany('App\Post','idtema');
    }
}
