<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Produto;

class FotoProduto extends Model
{
	use SoftDeletes;
	
    protected $table = "fotos_produtos";
    protected $primaryKey = "id";

    public function produto(){
        return $this->belongsTo(Produto::class, 'id_produtos', 'id');
    }
}