<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    

        public static function ehAdmin() {

        if(Auth::user() == null){
            return false;
        }
        $cliente = (DB::table('clientes')->where('id_users', Auth::user()->id)->first());
        return ($cliente->admin);
    }
    
}