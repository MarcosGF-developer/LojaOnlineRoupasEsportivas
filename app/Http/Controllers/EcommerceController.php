<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;

class EcommerceController extends Controller
{
   function ecommerce(){
        $produtos = Produto::all();
        $carrinho = session('carrinho.carrinho');
        return view('carrinho.ecommerce', ['produtos' => $produtos,'carrinho'=>$carrinho]);
    }
   
}



