<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
	use SoftDeletes;
	
    protected $table = "cidades";
    protected $primaryKey = "id";

    public function endereco(){
        return $this->hasMany('App\Models\Endereco', 'id_cidades', 'id');
    }
}