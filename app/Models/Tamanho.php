<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tamanho extends Model
{
	use SoftDeletes;
	
    protected $table = "tamanhos";
    protected $primaryKey = "id";

    public function produtos(){
        return $this->hasMany('App\Models\Produto', 'id_tamanhos', 'id');
    }
}