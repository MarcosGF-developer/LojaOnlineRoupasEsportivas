<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Produto;
class Tamanho extends Model
{
	use SoftDeletes;
	
    protected $table = "tamanhos";
    protected $primaryKey = "id";

    public function produtos(){
        return $this->hasMany('App\Models\Produto', 'id_tamanhos', 'id');
    }
}