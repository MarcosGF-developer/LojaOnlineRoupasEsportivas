<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Produto;

class Venda extends Model
{
    use SoftDeletes;
    
    protected $table = "vendas";
    protected $primaryKey = "id";

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_clientes', 'id');
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'id_enderecos', 'id');
    }
    
    public function produtos(){
        return $this->belongsToMany(Produto::class, 'produtos_vendas', 'id_vendas', 'id_produtos')->withTimestamps();
    }
}