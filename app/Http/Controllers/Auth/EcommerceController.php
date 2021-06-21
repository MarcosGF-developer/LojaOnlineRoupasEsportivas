<?php

namespace App\Http\Controller;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;

class EcommerceController extends Controller
{
	function ecommerce(){
        $ps = Produto::all();
        return view('ecommerce', ['ps' => $ps]);
    }

    }


}