<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Endereco;

class Cidade extends Model
{
	use SoftDeletes;
	
    protected $table = "cidades";
    protected $primaryKey = "id";

    public function endereco(){
        return $this->hasMany(Endereco::class, 'id_cidades', 'id');
    }
}