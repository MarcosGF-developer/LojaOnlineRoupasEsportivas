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


    public function categorias() {
        return $this->belongsTo(Categoria::class, 'id_categorias', 'id');
    }

    public function tamanhos() {
        return $this->belongsTo(Tamanho::class, 'id_tamanhos', 'id');
    }

    public function fotos(){
        return $this->hasMany(FotoProduto::class, 'id_produtos', 'id');
    }


    public function vendas() {
        return $this->belongsToMany(Venda::class, 'produtos_vendas', 'id_produtos', 'id_vendas')->withTimestamps();
    }
}