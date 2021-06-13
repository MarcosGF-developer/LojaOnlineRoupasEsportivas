<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoVenda extends Model
{
	use SoftDeletes; 
	
    protected $table = "produtos_vendas";
    protected $primaryKey = "id";
}