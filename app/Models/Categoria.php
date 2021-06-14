<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Produto;

class Categoria extends Model
{
	use SoftDeletes;
	
    protected $table = "categorias";
    protected $primaryKey = "id";

    public function produtos(){
        return $this->hasMany('App\Models\Produto','id_categorias', 'id');
    }
}