<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey = 'idvideo';
    protected $fillable = ['idpost','urlvideo','priority'];

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo('App\Post','idpost');
    }
}
