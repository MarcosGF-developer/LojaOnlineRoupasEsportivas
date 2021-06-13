<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
	use SoftDeletes;
	
    protected $table = "clientes";
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_users', 'id');
    }

    public function vendas(){
        return $this->hasMany('App\Models\Venda', 'id_clientes', 'id');
    }

    public function enderecos(){
        return $this->hasMany('App\Models\Endereco', 'id_clientes', 'id');
    }
}