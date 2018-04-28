<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    
     protected $table = "t_cat_asignatura";
     public $timestamps = false;
     protected $primary_key = 'as_id';
     protected $filename = ['as_nombre', 'as_nivel', 'as_creditos'];



     public static function asignature($nivel){

	return Asignatura::where('as_nivel', '=', $nivel)
    ->distinct()
	->get();

}
}
