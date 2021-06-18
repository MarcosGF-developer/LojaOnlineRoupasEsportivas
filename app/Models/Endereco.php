<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cliente;
use App\Models\Cidade;
use App\Models\Venda;

class Endereco extends Model
{
	use SoftDeletes;

    protected $table = "enderecos";
    protected $primaryKey = "id";

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_clientes', 'id');
    }

    public function vendas(){
        return $this->hasMany(Venda::class, 'id_enderecos', 'id');
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class, 'id_cidades', 'id');
    }
}