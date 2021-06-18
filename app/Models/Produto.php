<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FotoProduto;
use App\Models\Categoria;
use App\Models\Tamanho;
use App\Models\Venda;

class Produto extends Model
{
    use SoftDeletes; 
    
    protected $table = "produtos";
    protected $primaryKey = "id";

    public function fotos(){
        return $this->hasMany('App\Models\FotoProduto', 'id_produtos', 'id');
    }

    public function categorias() {
        return $this->belongsTo('App\Models\Categoria', 'id_produtos', 'id');
    }

    public function tamanhos() {
        return $this->belongsTo('App\Models\Tamanho', 'id_produtos', 'id');
    }

    public function vendas() {
        return $this->belongsToMany('App\Models\Venda', 'produtos_vendas', 'id_produtos', 'id_vendas')->withTimestamps();
    }
}