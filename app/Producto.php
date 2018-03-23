<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $connection ='arquiprod';
    protected $table ='productos';
    protected $primaryKey ='idproducto';
}
