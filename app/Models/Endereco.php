<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
	use SoftDeletes;

    protected $table = "enderecos";
    protected $primaryKey = "id";

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'id_clientes', 'id');
    }

    public function vendas(){
        return $this->hasMany('App\Models\Venda', 'id_enderecos', 'id');
    }

    public function cidade(){
        return $this->belongsTo('App\Models\Cidade', 'id_cidades', 'id');
    }
}